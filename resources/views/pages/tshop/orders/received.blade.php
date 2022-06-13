@extends('pages.tshop.layout')

@section('title', 'Checkout')

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
                                <h2 class="bradcaump-title">Checkout</h2>
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

        <div class="cart-main-area ptb--120 bg__white">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1 class="cart-heading">Your Order:</h4>
                                <div class="row">
                                    <div class="col-xl-3 col-lg-4">
                                        <p class="text-dark mb-2"
                                            style="font-weight: normal; font-size:16px; text-transform: uppercase;"><b>Billing Address</b>
                                        </p>
                                        <address>
                                            {{ $order->customer_first_name }} {{ $order->customer_last_name }}
                                            <br> {{ $order->customer_address1 }}
                                            <br> {{ $order->customer_address2 }}
                                            <br> Email: {{ $order->customer_email }}
                                            <br> Phone: {{ $order->customer_phone }}
                                            <br> Postcode: {{ $order->customer_postcode }}
                                        </address>
                                    </div>
                                    <div class="col-xl-3 col-lg-4">
                                        <p class="text-dark mb-2"
                                            style="font-weight: normal; font-size:16px; text-transform: uppercase;"><b>Shipment Address</b>
                                        </p>
                                        <address>
                                            {{ $order->shipment->first_name }} {{ $order->shipment->last_name }}
                                            <br> {{ $order->shipment->address1 }}
                                            <br> {{ $order->shipment->address2 }}
                                            <br> Email: {{ $order->shipment->email }}
                                            <br> Phone: {{ $order->shipment->phone }}
                                            <br> Postcode: {{ $order->shipment->postcode }}
                                        </address>
                                    </div>
                                    <div class="col-xl-3 col-lg-4">
                                        <p class="text-dark mb-2"
                                            style="font-weight: normal; font-size:16px; text-transform: uppercase;"><b>Details</b></p>
                                        <address>
                                            Invoice ID:
                                            <span class="text-dark">#{{ $order->code }}</span>
                                            <br> {{ \General::datetimeFormat($order->order_date) }}
                                            <br> Status: {{ $order->status }}
                                            <br> Payment Status: <b>{{ $order->payment_status }}</b>
                                            <br> Shipped by: {{ $order->shipping_service_name }}
                                        </address>
                                    </div>
                                </div>
                                <div class="table-content table-responsive">
                                    <table class="table mt-3 table-striped table-responsive-large"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($order->orderItems as $item)
                                            <tr>
                                                <td>{{ $item->sku }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{!! \General::showAttributes($item->attributes) !!}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ \General::priceFormat($item->base_price) }}</td>
                                                <td>{{ \General::priceFormat($item->sub_total) }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6">Order item not found!</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <ul>
                                                <li> Subtotal
                                                    <span>{{ \General::priceFormat($order->base_total_price) }}</span>
                                                </li>
                                                <li>Tax (10%)
                                                    <span>{{ \General::priceFormat($order->tax_amount) }}</span>
                                                </li>
                                                <li>Shipping Cost
                                                    <span>{{ \General::priceFormat($order->shipping_cost) }}</span>
                                                </li>
                                                <li>Total
                                                    <span>{{ \General::priceFormat($order->grand_total) }}</span>
                                                </li>
                                            </ul>
                                            @if (!$order->isPaid())
                                            <a href="{{ $order->payment_url }}">Proceed to payment</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection