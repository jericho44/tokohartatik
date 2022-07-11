<?php

namespace App\Http\Controllers\Admin;

use App\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Models\ProductImage;
use App\Models\ProductInventory;
use Illuminate\Http\Request;

use Str;
use DB;
use Session;
use Auth;

class ProductController extends Controller
{
    use Authorizable;

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name', 'ASC')->paginate(10);

        return view('pages.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get()->toArray();
        $products = null;
        $categoryIDs = [];
        $statuses = Product::statuses();
        $types = Product::types();
        $configurableAttributes = $this->getConfigurableAttributes();

        return view('pages.admin.products.create')->with([
            'categories' => $categories,
            'products' => $products,
            'categoryIDs' => $categoryIDs,
            'statuses' => $statuses,
            'types' => $types,
            'configurableAttributes' => $configurableAttributes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);
        $data['user_id'] = Auth::user()->id;


        $product = DB::transaction(function () use ($data) {
            $categoryIDs = !empty($data['category_ids']) ? $data['category_ids'] : [];
            $product = Product::create($data);
            $product->categories()->sync($categoryIDs);

            if ($data['type'] == 'configurable') {
                $this->generateProductVariants($product, $data);
            }

            return $product;
        });

        if ($product) {
            Session()->flash('success', 'Produk baru berhasil ditambahkan.');
        } else {
            Session()->flash('error', 'Produk gagal ditambahkan');
        }

        return redirect()->route('products.edit', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (empty($id)) {
            return redirect()->route('products.index');
        }

        $product = Product::findOrFail($id);
        $product['qty'] = isset($product->productInventory) ? $product->productInventory->qty : null;

        $categories = Category::orderBy('name', 'ASC')->get()->toArray();
        $categoryIDs = $product->categories->pluck('id')->toArray();
        $statuses = Product::statuses();
        $types = Product::types();
        $configurableAttributes = $this->getConfigurableAttributes();

        return view('pages.admin.products.edit')->with([
            'categories' => $categories,
            'product' => $product,
            'categoryIDs' => $categoryIDs,
            'statuses' => $statuses,
            'types' => $types,
            'configurableAttributes' => $configurableAttributes,
        ]);
    }

    private function getConfigurableAttributes()
    {
        return Attribute::where('is_configurable', true)->get();
    }

    private function generateAttributeCombinations($arrays)
    {
        $result = [[]];
        foreach ($arrays as $property => $property_values) {
            $tmp = [];
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));
                }
            }
            $result = $tmp;
        }
        return $result;
    }

    private function convertVariantName($variant)
    {
        $variantName = '';

        foreach (array_keys($variant) as $key => $code) {
            $attributeOptionID = $variant[$code];
            $attributeOption = AttributeOption::find($attributeOptionID);

            if ($attributeOption) {
                $variantName .= '-' . $attributeOption->name;
            }
        }

        return $variantName;
    }

    private function generateProductVariants($product, $data)
    {
        $configurableAttributes = $this->getConfigurableAttributes();

        $vartiantAttributes = [];
        foreach ($configurableAttributes as $attribute) {
            $vartiantAttributes[$attribute->code] = $data[$attribute->code];
        }

        $variants = $this->generateAttributeCombinations($vartiantAttributes);

        if ($variants) {
            foreach ($variants as $variant) {
                $variantData = [
                    'parent_id' => $product->id,
                    'user_id' => Auth::user()->id,
                    'sku' => $product->sku . '-' . implode('-', array_values($variant)),
                    'type' => 'simple',
                    'name' => $product->name . $this->convertVariantName($variant),
                ];

                $variantData['slug'] = Str::slug($variantData['name']);

                $newProductVariant = Product::create($variantData);

                $categoryIDs = !empty($data['category_ids']) ? $data['category_ids'] : [];
                $newProductVariant->categories()->sync($categoryIDs);

                $this->saveProductAttributeValues($newProductVariant, $variant);
            }
        }
    }

    private function saveProductAttributeValues($product, $variant)
    {
        foreach (array_values($variant) as $attributeOptionID) {
            $attributeOption = AttributeOption::find($attributeOptionID);

            $attributeOption = [
                'parent_product_id' => $product->parent_id,
                'product_id' => $product->id,
                'attribute_id' => $attributeOption->attribute_id,
                'text_value' => $attributeOption->name,
            ];

            ProductAttributeValue::create($attributeOption);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);

        $product = Product::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(function () use ($product, $data) {
            $categoryIDs = !empty($data['category_ids']) ? $data['category_ids'] : [];
            $product->update($data);
            $product->categories()->sync($categoryIDs);

            if ($product->type == 'configurable') {
                $this->updateProductVariants($data);
            } else {
                ProductInventory::updateOrCreate([
                    'product_id' => $product->id
                ], [
                    'qty' => $data['qty']
                ]);
            }

            return true;
        });

        if ($saved) {
            Session()->flash('success', 'Produk berhasil disimpan.');
        } else {
            Session()->flash('error', 'Produk gagal disimpan');
        }

        return redirect()->route('products.index');
    }

    private function updateProductVariants($data)
    {
        if ($data['variants']) {
            foreach ($data['variants'] as $productData) {
                $product = Product::find($productData['id']);
                $product->update($productData);

                $product->status = $data['status'];
                $product->save();

                ProductInventory::updateOrCreate([
                    'product_id' => $product->id
                ], [
                    'qty' => $productData['qty']
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Product::findOrFail($id);

        if ($produk->delete()) {
            Session()->flash('success', 'Produk berhasil dihapus.');
        }

        return redirect()->route('products.index');
    }

    public function deletePermanent($id)
    {
        $product = Product::findOrFail($id);

        if ($product->forceDelete()) {
            Session()->flash('success', 'Produk berhasil dihapus.');
        }

        return redirect()->route('products.index');
    }

    public function images()
    {
        // $products = Product::orderBy('name', 'ASC')->paginate(10);
        $products = Product::with('productImages')->orderBy('name', 'ASC')->paginate(10);

        // return dd($productImages);
        return view('pages.admin.products.images', compact('products'));
    }

    public function addImage($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.admin.products.add_image', compact('product'));
    }

    public function uploadImage(ProductImageRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $product->slug . '_' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $folder = ProductImage::UPLOAD_DIR . '/images';

            $filePath = $image->storeAs($folder . '/original', $fileName, 'public');

            $resizedImage = $this->_resizeImage($image, $fileName, $folder);

            $params = array_merge(
                [
                    'product_id' => $product->id,
                    'path' => $filePath,
                ],
                $resizedImage
            );

            if (ProductImage::create($params)) {
                Session::flash('success', 'Image has been uploaded');
            } else {
                Session::flash('error', 'Image could not be uploaded');
            }

            return redirect()->route('products.images');
        }
    }

    private function _resizeImage($image, $fileName, $folder)
    {
        $resizedImage = [];

        $smallImageFilePath = $folder . '/small/' . $fileName;
        $size = explode('x', ProductImage::SMALL);
        list($width, $height) = $size;

        $smallImageFile = \Image::make($image)->fit($width, $height)->stream();
        if (\Storage::put('public/' . $smallImageFilePath, $smallImageFile)) {
            $resizedImage['small'] = $smallImageFilePath;
        }

        $mediumImageFilePath = $folder . '/medium/' . $fileName;
        $size = explode('x', ProductImage::MEDIUM);
        list($width, $height) = $size;

        $mediumImageFile = \Image::make($image)->fit($width, $height)->stream();
        if (\Storage::put('public/' . $mediumImageFilePath, $mediumImageFile)) {
            $resizedImage['medium'] = $mediumImageFilePath;
        }

        $largeImageFilePath = $folder . '/large/' . $fileName;
        $size = explode('x', ProductImage::LARGE);
        list($width, $height) = $size;

        $largeImageFile = \Image::make($image)->fit($width, $height)->stream();
        if (\Storage::put('public/' . $largeImageFilePath, $largeImageFile)) {
            $resizedImage['large'] = $largeImageFilePath;
        }

        $extraLargeImageFilePath  = $folder . '/xlarge/' . $fileName;
        $size = explode('x', ProductImage::EXTRA_LARGE);
        list($width, $height) = $size;

        $extraLargeImageFile = \Image::make($image)->fit($width, $height)->stream();
        if (\Storage::put('public/' . $extraLargeImageFilePath, $extraLargeImageFile)) {
            $resizedImage['extra_large'] = $extraLargeImageFilePath;
        }

        return $resizedImage;
    }

    public function viewImage($id)
    {
        $product = Product::findOrFail($id);
        $productImage = ProductImage::where('product_id', $id)->paginate(3);

        return view('pages.admin.products.view_image', compact('product', 'productImage'));
    }

    public function removeImage($id)
    {
        $productId = $id;
        $imageId = $id;

        if ($image = ProductImage::where('product_id', $productId)->delete()) {
            Session()->flash('success', 'Foto Produk behasil dihapus.');
        }

        if ($image = ProductImage::where('id', $imageId)->first()) {

            if ($image->forceDelete()) {
                Session()->flash('success', 'Foto Produk behasil dihapus.');
            } else {
                Session()->flash('success', 'Foto Produk gagal dihapus.');
            }
        }

        return redirect()->route('products.images');
    }

    public function trashed()
    {
        $this->data['products'] = Product::onlyTrashed()->orderBy('created_at', 'DESC')->paginate(10);

        return view('pages.admin.products.trashed', $this->data);
    }

    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();

        return redirect()->back();
    }
}
