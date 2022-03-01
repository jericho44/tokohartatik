<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

use Str;
use DB;
use Session;
use Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $statuses = Product::statuses();
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

        return view('pages.admin.products.create', compact('categories', 'products', 'categoryIDs', 'statuses'));
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

        $saved = false;
        $saved = DB::transaction(function () use ($data) {
            $product = Product::create($data);
            $product->categories()->sync($data['category_ids']);

            return true;
        });

        if ($saved) {
            Session()->flash('success', 'Produk baru berhasil ditambahkan.');
        } else {
            Session()->flash('error', 'Produk gagal ditambahkan');
        }

        return redirect()->route('products.index');
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
        $categories = Category::orderBy('name', 'ASC')->get()->toArray();
        $categoryIDs = $product->categories->pluck('id')->toArray();
        $statuses = Product::statuses();

        return view('pages.admin.products.edit', compact('product', 'categories', 'categoryIDs', 'statuses'));
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
            $product->update($data);
            $product->categories()->sync($data['category_ids']);

            return true;
        });

        if ($saved) {
            Session()->flash('success', 'Produk berhasil disimpan.');
        } else {
            Session()->flash('error', 'Produk gagal disimpan');
        }

        return redirect()->route('products.index');
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
            $name = $product->slug . '-' . $product->sku . '-' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $folder = '/uploads/images';
            $filePath = $image->storeAs($folder, $fileName, 'public');

            $dataImage = [
                'product_id' => $product->id,
                'path' => $filePath,
            ];

            if (ProductImage::create($dataImage)) {
                Session()->flash('success', 'Foto Produk berhasil ditambahkan.');
            } else {
                Session()->flash('error', 'Foto Produk gagal ditambahkan.');
            }
        }

        return redirect()->route('products.images');
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
}
