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
                                <form action="#">
                                    <div class="table-content table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">Image</th>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-quantity">Quantity</th>
                                                    <th class="product-subtotal">Total</th>
                                                    <th class="product-remove">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="product-thumbnail"><a href="#"><img src="images/product/4.png"
                                                                alt="product img" /></a></td>
                                                    <td class="product-name"><a href="#">Vestibulum suscipit</a></td>
                                                    <td class="product-price"><span class="amount">£165.00</span></td>
                                                    <td class="product-quantity"><input type="number" value="1" /></td>
                                                    <td class="product-subtotal">£165.00</td>
                                                    <td class="product-remove"><a href="#">X</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="product-thumbnail"><a href="#"><img src="images/product/3.png"
                                                                alt="product img" /></a></td>
                                                    <td class="product-name"><a href="#">Vestibulum dictum magna</a></td>
                                                    <td class="product-price"><span class="amount">£50.00</span></td>
                                                    <td class="product-quantity"><input type="number" value="1" /></td>
                                                    <td class="product-subtotal">£50.00</td>
                                                    <td class="product-remove"><a href="#">X</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-7 col-xs-12">
                                            <div class="buttons-cart">
                                                <input type="submit" value="Update Cart" />
                                                <a href="{{ route('shop') }}">Continue Shopping</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-5 col-xs-12">
                                            <div class="cart_totals">
                                                <h2>Cart Totals</h2>
                                                <table>
                                                    <tbody>
                                                        <tr class="cart-subtotal">
                                                            <th>Subtotal</th>
                                                            <td><span class="amount">£215.00</span></td>
                                                        </tr>
                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            <td>
                                                                <strong><span class="amount">£215.00</span></strong>
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
                                </form>
                            </div>
                        </div>
                    </div>
        </div>
</div>
@endsection