@extends('pages.tshop.layout')

@section('title', 'Toko')

@section('content')
<!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area"
            style="background: rgba(0, 0, 0, 0) url({{ asset('tshop/assets/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Shop Page</h2>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
                                    <span class="brd-separetor">/</span>
                                    <span class="breadcrumb-item active">Shop Page</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Our Product Area -->
        <section class="htc__product__area shop__page ptb--130 bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <!-- Start Product MEnu -->
                    @include('pages.tshop.shop.category')
                    <!-- Start Filter Menu -->
                    @include('pages.tshop.shop.filter')
                    <!-- End Filter Menu -->
                    <!-- End Product MEnu -->
                    <div class="row">
                        <div class="product__list another-product-style">
                            @forelse ($products as $product)
                            <!-- Start Single Product -->
                            <div class="col-md-3 col-lg-3 cat--1 col-sm-4 col-xs-12 single__pro">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                @if($product->productImages->first())
                                                <img src="{{ asset('storage/'.$product->productImages->first()->path) }}" alt="{{ $product->name }}" style=" height: 300px">
                                                @else
                                                <img src="{{ asset('tshop/assets/images/product/1.jpg') }}" alt="product images">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a data-toggle="modal" data-target="#productModal" title="Quick View"
                                                        class="quick-view modal-view detail-link" product-slug="{{ $product->slug }}" href="#"><span
                                                            class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="" class="add-to-card" product-id="{{ $product->id }}" product-type="{{ $product->type }}" product-slug="{{ $product->slug }}"><span
                                                            class="ti-shopping-cart"></span></a></li>
                                                <li><a title="Wishlist" href="" class="add-to-fav" product-slug="{{ $product->slug }}"><span
                                                            class="ti-heart"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a></h2>
                                        <ul class="product__price">
                                            {{-- <li class="old__price">$16.00</li> --}}
                                            <li class="new__price">{{ number_format($product->priceLabel()) }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            @empty
                            <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
                                <p>Produk Kosong</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- Start Load More BTn -->
                    <div class="row mt--60">
                        <div class="col-md-12">
                            <div class="htc__loadmore__btn">
                                <a href="#">load more</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Load More BTn -->
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
    </div>
    <!-- Body main wrapper end -->
@endsection