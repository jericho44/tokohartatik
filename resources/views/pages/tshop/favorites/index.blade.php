@extends('pages.tshop.layout')

@section('title', 'Favorite')

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
                            <h2 class="bradcaump-title">Favorite</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Favorite</span>
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
                <div class="col-lg-3">
                    @include('pages.tshop.includes.user_menu')
                </div>
                <div class="col-lg-9">
                    {{-- @include('admin.partials.flash') --}}
                    <div class="shop-product-wrapper res-xl">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>remove</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($favorites as $favorite)
                                    @php
                                    $product = $favorite->product;
                                    $product = isset($product->parent) ?: $product;
                                    $image = !empty($product->productImages->first()->small) ?
                                    asset('storage/'. $product->productImages->first()->small) :
                                    asset('storage/'. $product->productImages->first()->path) 
                                    @endphp
                                    <tr>
                                        <td class="product-remove">
                                            {!! Form::open(['url' => 'favorites/'. $favorite->id, 'class' => 'delete',
                                            'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            <button type="submit"
                                                style="background-color: transparent; border-color: #FFF;">X</button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="{{ url('product/'. $product->slug) }}"><img src="{{ $image }}"
                                                    alt="{{ $product->name }}" style="width:100px"></a>
                                        </td>
                                        <td class="product-name"><a href="{{ url('product/'. $product->slug) }}">{{
                                                $product->name }}</a></td>
                                        <td class="product-price-cart"><span class="amount">{{
                                                number_format($product->priceLabel()) }}</span></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">You have no favorite product</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $favorites->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection