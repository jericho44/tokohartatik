@extends('pages.tshop.layout')

@section('title', 'Toko Hartatik')
@section('content')
    <!-- Start Feature Product -->
    <section class="categories-slider-area bg__white">
        <div class="container">
            <div class="row">
                <!-- Start Left Feature -->
                <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
                    <!-- Start Slider Area -->
                    <div class="slider__container slider--one">
                        <div class="slider__activation__wrap owl-carousel owl-theme">
                            <!-- Start Single Slide -->
                            <div class="slide slider__full--screen slider-height-inherit slider-text-right"
                                style="background: rgba(0, 0, 0, 0) url({{ asset('tshop/assets/images/slider/bg/1.png') }}) no-repeat scroll center center / cover ;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                            <div class="slider__inner">
                                                <h1>New Product <span class="text--theme">Collection</span></h1>
                                                <div class="slider__btn">
                                                    <a class="htc__btn" href="cart.html">shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slide -->
                            <!-- Start Single Slide -->
                            <div class="slide slider__full--screen slider-height-inherit  slider-text-left"
                                style="background: rgba(0, 0, 0, 0) url({{ asset('tshop/assets/images/slider/bg/2.png') }}) no-repeat scroll center center / cover ;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                            <div class="slider__inner">
                                                <h1>New Product <span class="text--theme">Collection</span></h1>
                                                <div class="slider__btn">
                                                    <a class="htc__btn" href="cart.html">shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slide -->
                        </div>
                    </div>
                    <!-- Start Slider Area -->
                </div>
                @include('pages.tshop.includes.slider')
                <!-- End Left Feature -->
            </div>
        </div>
    </section>
    <!-- End Feature Product -->
    @include('pages.tshop.includes.banner')
    <!-- Start Our Product Area -->
    <section class="htc__product__area bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-style-tab">
                        <div class="product-tab-list">
                            <!-- Nav tabs -->
                            <ul class="tab-style" role="tablist">
                                <li class="active">
                                    <a href="#home1" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>latest </h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home2" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>best sale </h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home3" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>top rated</h4>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#home4" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>on sale</h4>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content another-product-style jump">
                            <div class="tab-pane active" id="home1">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/1.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/2.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/3.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/4.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/5.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="home2">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/4.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/5.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/6.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/7.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/8.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="home3">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/2.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/1.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/5.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/4.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/3.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="home4">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/9.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/5.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/3.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/4.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                            <div class="product">
                                                <div class="product__inner">
                                                    <div class="pro__thumb">
                                                        <a href="#">
                                                            <img src="{{ asset('tshop/assets/images/product/2.png') }}"
                                                                alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="product__hover__info">
                                                        <ul class="product__action">
                                                            <li><a data-toggle="modal" data-target="#productModal"
                                                                    title="Quick View"
                                                                    class="quick-view modal-view detail-link" href="#"><span
                                                                        class="ti-plus"></span></a></li>
                                                            <li><a title="Add TO Cart" href="cart.html"><span
                                                                        class="ti-shopping-cart"></span></a></li>
                                                            <li><a title="Wishlist" href="wishlist.html"><span
                                                                        class="ti-heart"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__details">
                                                    <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                    <ul class="product__price">
                                                        <li class="old__price">$16.00</li>
                                                        <li class="new__price">$10.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Product Area -->
    <div class="only-banner ptb--100 bg__white">
    
    </div>
@endsection