<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
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
}
