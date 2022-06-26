<?php

namespace App\Http\Controllers;

use App\Models\AttributeOption;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use Illuminate\Http\Request;

use Str;

class ShopController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->data['search'] = null;
        $this->data['categories'] = Category::parentCategories()
            ->orderBy('name', 'ASC')
            ->get();

        $this->data['minPrice'] = Product::min('price');
        $this->data['maxPrice'] = Product::max('price');

        $this->data['colors'] = AttributeOption::whereHas('attribute', function ($query) {
            $query->where('code', 'color')
                ->where('is_filterable', 1);
        })->orderBy('name', 'ASC')->get();

        $this->data['sizes'] = AttributeOption::whereHas('attribute', function ($query) {
            $query->where('code', 'size')
                ->where('is_filterable', 1);
        })->orderBy('name', 'ASC')->get();

        $this->data['sorts'] = [
            url('shop') => 'Default',
            url('shop?sort=price-asc') => 'Harga - Low to High',
            url('shop?sort=price-desc') => 'Harga - High to Low',
            url('shop?sort=created_at-desc') => 'Terbaru',
            url('shop?sort=created_at-asc') => 'Terlama',
        ];

        $this->data['selectedSort'] = url('shop');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::active();

        $products = $this->_searchProducts($products, $request);
        $products = $this->_filterProductsByRange($products, $request);
        $products = $this->_filterProductsByCategory($products, $request);
        $products = $this->_sortProducts($products, $request);

        $products = $products->paginate(15);

        return view('pages.tshop.shop.index', $this->data)->with(
            [
                'products' => $products,
                // 'search' => null !== $search ? $search : null,
            ]
        );
    }

    private function _searchProducts($products, $request)
    {
        if ($search = $request->get('search')) {
            $search = str_replace('-', ' ', Str::slug($search));

            $products = $products->whereRaw('MATCH(name, slug, short_description, description) AGAINST (? IN NATURAL LANGUAGE MODE)', [$search]);
        }

        if ($categorySlug = $request->get('category')) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();

            $childIds = Category::childIds($category->id);
            $categoryIds = array_merge([$category->id], $childIds);

            $products = $products->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('categories.id', $categoryIds);
            });
        }

        return $products;
    }

    private function _filterProductsByRange($products, $request)
    {
        $lowPrice = null;
        $highPrice = null;

        if ($priceSlider = $request->get('price')) {
            $prices = explode('-', $priceSlider);

            $lowPrice = !empty($prices[0]) ? (float)$prices[0] : $this->data['minPrice'];
            $highPrice = !empty($prices[1]) ? (float)$prices[1] : $this->data['maxPrice'];

            if ($lowPrice && $highPrice) {
                $products = $products->where('price', '>=', $lowPrice)
                    ->where('price', '<=', $highPrice)
                    ->orWhereHas('variants', function ($query) use ($lowPrice, $highPrice) {
                        $query->where('price', '>=', $lowPrice)
                            ->where('price', '<=', $highPrice);
                    });

                $this->data['lowPrice'] = $lowPrice;
                $this->data['highPrice'] = $highPrice;
            }
        }

        return $products;
    }

    private function _filterProductsByCategory($products, $request)
    {
        if ($attributeOptionID = $request->get('option')) {
            $attributeOption = AttributeOption::findOrFail($attributeOptionID);

            $products = $products->whereHas('ProductAttributeValues', function ($query) use ($attributeOption) {
                $query->where('attribute_id', $attributeOption->attribute_id)
                    ->where('text_value', $attributeOption->name);
            });
        }

        return $products;
    }

    private function _sortProducts($products, $request)
    {
        if ($sort = preg_replace('/\s+/', '', $request->get('sort'))) {
            $availableSorts = ['price', 'created_at'];
            $availableOrder = ['asc', 'desc'];
            $sortAndOrder = explode('-', $sort);

            $sortBy = strtolower($sortAndOrder[0]);
            $orderBy = strtolower($sortAndOrder[1]);

            if (in_array($sortBy, $availableSorts) && in_array($orderBy, $availableOrder)) {
                $products = $products->orderBy($sortBy, $orderBy);
            }

            $this->data['selectedSort'] = url('shop?sort=' . $sort);
        }

        return $products;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::Active()->where('slug', $slug)->first();

        if ($product->configurable()) {
            $product['colors'] = ProductAttributeValue::getAttributeOptions($product, 'color')->pluck('text_value', 'text_value');
            $product['sizes'] = ProductAttributeValue::getAttributeOptions($product, 'size')->pluck('text_value', 'text_value');
            $product['qty'] = Product::getQtyOptions($product);
        }

        return view('pages.tshop.shop.product_details', $this->data)->with([
            'product' => $product,
        ]);
    }

    public function quickView($slug)
    {
        $product = Product::active()->where('slug', $slug)->firstOrFail();
        if ($product->configurable()) {
            $this->data['colors'] = ProductAttributeValue::getAttributeOptions($product, 'color')->pluck('text_value', 'text_value');
            $this->data['sizes'] = ProductAttributeValue::getAttributeOptions($product, 'size')->pluck('text_value', 'text_value');
        }

        $this->data['product'] = $product;

        return view('pages.tshop.shop.quick_view', $this->data);
    }
}
