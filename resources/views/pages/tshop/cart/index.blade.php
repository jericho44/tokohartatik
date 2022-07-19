@extends('pages.tshop.layout')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="wrapper fixed__footer">
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area"
        style="background: rgba(0, 0, 0, 0) url({{ asset('tshop/assets/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Cart</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Cart</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <div class="cart-main-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {!! Form::open(['url' => 'carts/update']) !!}
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Produk</th>
                                        <th class="product-price">Harga</th>
                                        <th class="product-quantity">Jumlah</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                    @php
                                        $product = isset($item->associatedModel->parent) ? $item->associatedModel->parent : $item->associatedModel;
                                        $image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) :
                                        asset('tshop/assets/img/cart/3.jpg')
                                    @endphp
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{ route('product.details', $product->slug) }}"><img src="{{ $image }}" alt="{{ $product->name }}"
                                                    style="width:100px"></a>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('product.details', $product->slug) }}">{{ $item->name }}</a>
                                        </td>
                                        <td class="product-price-cart">
                                            <span class="amount">{{ number_format($item->price) }}</span>
                                        </td>
                                        <td class="product-quantity">
                                            {{-- <input name="" value="{{ $item->quantity }}" type="number" min="1"> --}}
                                            {!! Form::number('items['. $item->id .'][quantity]', $item->quantity, ['min' => 1, 'required' => true]) !!}
                                        </td>
                                        <td class="product-subtotal">{{ number_format($item->price * $item->quantity)}}</td>
                                        <td class="product-remove">
                                            <a href="{{ route('carts.remove', $item->id) }}" class="delete">X</span></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">Keranjang Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                <div class="buttons-cart">
                                    <input class="button" name="update_cart" value="Update cart" type="submit">
                                    <a href="{{ route('shop') }}">Continue Shopping</a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                <div class="cart_totals">
                                    <h2>Total Keranjang</h2>
                                    <table>
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td><span class="amount">Rp. {{ number_format(\Cart::getSubTotal()) }}</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td>
                                                    <strong><span class="amount">Rp. {{ number_format(\Cart::getTotal()) }}</span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="wc-proceed-to-checkout">
                                        <a href="{{ route('orders.checkout') }}">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection