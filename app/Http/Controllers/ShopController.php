<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::active();

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

        $products = $products->paginate(15);

        return view('pages.tshop.shop.index', $this->data)->with(
            [
                'products' => $products,
                'search' => null !== $search ? $search : null,
            ]
        );
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
}
