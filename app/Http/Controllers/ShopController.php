<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttributeValue;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::active()->paginate(15);

        return view('pages.tshop.shop.index')->with(
            [
                'products' => $products
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

        return view('pages.tshop.shop.product_details')->with([
            'product' => $product,
        ]);
    }
}
