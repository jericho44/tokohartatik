<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->data['search'] = null;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \Cart::getContent();

        return view('pages.tshop.cart.index')->with([
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request;

        $product = Product::findOrFail($params['product_id']);
        $slug = $product->slug;

        $attributes = [];

        if ($product->configurable()) {
            $product = Product::from('products')
                ->whereRaw("`products`.parent_id = :parent_product_id
                                AND (SELECT pav.text_value
                                        FROM product_attribute_values pav
                                        JOIN attributes a
                                        ON a.id = pav.attribute_id
                                        WHERE a.code = :size_code
                                        AND pav.product_id = `products`.id
                                        LIMIT 1
                                    ) = :size_value
                                AND (SELECT pav.text_value
                                        FROM product_attribute_values pav
                                        JOIN attributes a
                                        ON a.id = pav.attribute_id
                                        WHERE a.code = :color_code
                                        AND pav.product_id = `products`.id
                                        LIMIT 1
                                    ) = :color_value
                                    ", [
                    'parent_product_id' => $product->id,
                    'size_code' => 'size',
                    'size_value' => $params['size'],
                    'color_code' => 'color',
                    'color_Value' => $params['color'],
                ])->firstOrFail();

            $attributes['size'] = $params['size'];
            $attributes['color'] = $params['color'];
        }

        $item = [
            'id' => md5($product->id),
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $params['qty'],
            'attributes' => $attributes,
            'associatedModel' => $product,
        ];

        \Cart::add($item);

        \Session::flash('success', 'Produk' . $item['name'] . 'berhasil ditambahkan ke keranjang');
        return redirect()->route('product.details', $slug);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $params = $request;

        if ($items = $params['items']) {
            foreach ($items as $cardID => $item) {
                \Cart::update($cardID, [
                    'quantity' => [
                        'relative' => false,
                        'value' => $item['quantity'],
                    ],
                ]);
            }

            \Session::flash('success', 'Berhasil mengubah Keranjang Belanja.');
            return redirect()->back();
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
        \Cart::remove($id);

        return redirect()->back();
    }
}
