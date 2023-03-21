@extends('pages.tshop.layout')

@section('title', 'Produk Detail')

@section('content')
<!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area"
            style="background: rgba(0, 0, 0, 0) url({{ asset('tshop/assets/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Product Details</h2>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
                                    <span class="brd-separetor">/</span>
                                    <span class="breadcrumb-item active">Product Details</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details -->
        <section class="htc__product__details pt--120 pb--100 bg__white">
            <div class="container">
                <div class="row">
                    {{-- {{ $product }} --}}
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="product__details__container">
                            <!-- Start Small images -->
                            {{-- <ul class="product__small__images" role="tablist">
                                <li role="presentation" class="pot-small-img active">
                                    <a href="#img-tab-1" role="tab" data-toggle="tab">
                                        <img src="{{ asset('tshop/assets/images/product-details/small-img/1.jpg') }}" alt="small-image">
                                    </a>
                                </li>
                                <li role="presentation" class="pot-small-img">
                                    <a href="#img-tab-2" role="tab" data-toggle="tab">
                                        <img src="{{ asset('tshop/assets/images/product-details/small-img/2.jpg') }}" alt="small-image">
                                    </a>
                                </li>
                                <li role="presentation" class="pot-small-img hidden-xs">
                                    <a href="#img-tab-3" role="tab" data-toggle="tab">
                                        <img src="{{ asset('tshop/assets/images/product-details/small-img/3.jpg') }}" alt="small-image">
                                    </a>
                                </li>
                                <li role="presentation" class="pot-small-img hidden-xs hidden-sm">
                                    <a href="#img-tab-4" role="tab" data-toggle="tab">
                                        <img src="{{ asset('tshop/assets/images/product-details/small-img/2.jpg') }}" alt="small-image">
                                    </a>
                                </li>
                            </ul> --}}
                            <!-- End Small images -->
                            <div class="product__big__images">
                                <div class="portfolio-full-image tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-tab-1">
                                       <div class="easyzoom easyzoom--overlay">
                                            @if ($product->productImages->first()->large && $product->productImages->first()->extra_large)
                                            <a href="{{ asset('storage/'.$product->productImages->first()->extra_large) }}">
                                                <img src="{{ asset('storage/'.$product->productImages->first()->extra_large) }}" alt="{{ $product->name }}">
                                            </a>
                                            @else
                                                @if ($product->productImages->first()->path)
                                                    <a href="{{ asset('storage/'.$product->productImages->first()->path) }}">
                                                        <img src="{{ asset('storage/'.$product->productImages->first()->path) }}" alt="{{ $product->name }}">
                                                    </a>
                                                @else
                                                    <img src="{{ asset('tshop/assets/images/product-details/big-img/10.jpg') }}" alt="full-image">
                                                @endif
                                            @endif
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                        <div class="htc__product__details__inner">
                            <div class="pro__detl__title">
                                <h2>{{ $product->name }}</h2>
                            </div>
                            {{-- <div class="pro__dtl__rating">
                                <ul class="pro__rating">
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                </ul>
                                <span class="rat__qun">(Based on 0 Ratings)</span>
                            </div> --}}
                            <div class="pro__details">
                                <p>{!! $product->description !!}</p>
                            </div>
                            <ul class="pro__dtl__prize">
                                {{-- <li class="old__prize">$15.21</li> --}}
                                <li>Rp. {{ number_format($product->priceLabel()) }}</li>
                            </ul>
                            {!! Form::open(['url' => 'carts']) !!}
                             {{ Form::hidden('product_id', $product->id) }}
                                @csrf
                                @if ($product->type == 'configurable')
                                <div class="pro__dtl__color">
                                    <h2 class="title__5">Pilih Warna</h2>
                                        <div class="select-option-part">
                                            {!! Form::select('color', $product['colors'] , null, ['class' => 'select', 'placeholder' => '- Select -', 'required' =>
                                            true]) !!}
                                        </div>
                                    </div>
                                <div class="pro__dtl__size">
                                    <h2 class="title__5">Pilih Ukuran</h2>
                                    <div class="select-option-part">
                                        {!! Form::select('size', $product['sizes'] , null, ['class' => 'select', 'placeholder' => '- Select -', 'required' =>
                                        true]) !!}
                                    </div>
                                </div>
                                @endif
                            <div class="product-action-wrap">
                                <div class="prodict-statas"><span>Jumlah :</span></div>
                                <div class="product-quantity">
                                        <div class="product-quantity">
                                            <div class="cart-plus-minus">
                                               {!! Form::number('qty', 1, ['class' => 'cart-plus-minus-box', 'placeholder' => 'Jumlah', 'min' => 1, 'max' => $product->qty['qty'] ]) !!}
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <ul class="pro__dtl__btn">
                                <li class="buy__now__btn"><button>Add Cart</button></li>
                                <li><a href="#"><span class="ti-heart"></span></a></li>
                                {{-- <li><a href="#"><span class="ti-email"></span></a></li> --}}
                            </ul>
                            {!! Form::close() !!}
                            {{-- <div class="pro__social__share">
                                <h2>Share :</h2>
                                <ul class="pro__soaial__link">
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Details -->
        <!-- Start Product tab -->
        {{-- <section class="htc__product__details__tab bg__white pb--120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <ul class="product__deatils__tab mb--60" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#description" role="tab" data-toggle="tab">Description</a>
                            </li>
                            <li role="presentation">
                                <a href="#sheet" role="tab" data-toggle="tab">Data sheet</a>
                            </li>
                            <li role="presentation">
                                <a href="#reviews" role="tab" data-toggle="tab">Reviews</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product__details__tab__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="product__tab__content fade in active">
                                <div class="product__description__wrap">
                                    <div class="product__desc">
                                        <h2 class="title__6">Details</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis noexercit
                                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                            mollit anim id.</p>
                                    </div>
                                    <div class="pro__feature">
                                        <h2 class="title__6">Features</h2>
                                        <ul class="feature__list">
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Irure dolor in reprehenderit in
                                                    voluptate velit esse</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Sed do eiusmod tempor
                                                    incididunt ut labore et </a></li>
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Nisi ut aliquip ex ea commodo
                                                    consequat.</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="sheet" class="product__tab__content fade">
                                <div class="pro__feature">
                                    <h2 class="title__6">Data sheet</h2>
                                    <ul class="feature__list">
                                        <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Duis aute irure dolor in
                                                reprehenderit in voluptate velit esse</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Irure dolor in reprehenderit in
                                                voluptate velit esse</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Irure dolor in reprehenderit in
                                                voluptate velit esse</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Sed do eiusmod tempor incididunt ut
                                                labore et </a></li>
                                        <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Sed do eiusmod tempor incididunt ut
                                                labore et </a></li>
                                        <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Nisi ut aliquip ex ea commodo
                                                consequat.</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Nisi ut aliquip ex ea commodo
                                                consequat.</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="reviews" class="product__tab__content fade">
                                <div class="review__address__inner">
                                    <!-- Start Single Review -->
                                    <div class="pro__review">
                                        <div class="review__thumb">
                                            <img src="{{ asset('tshop/assets/images/review/1.jpg') }}" alt="review images">
                                        </div>
                                        <div class="review__details">
                                            <div class="review__info">
                                                <h4><a href="#">Gerald Barnes</a></h4>
                                                <ul class="rating">
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star-half"></i></li>
                                                    <li><i class="zmdi zmdi-star-half"></i></li>
                                                </ul>
                                                <div class="rating__send">
                                                    <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                </div>
                                            </div>
                                            <div class="review__date">
                                                <span>27 Jun, 2016 at 2:30pm</span>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas
                                                elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent
                                                et messages in con sectetur posuere dolor non.</p>
                                        </div>
                                    </div>
                                    <!-- End Single Review -->
                                    <!-- Start Single Review -->
                                    <div class="pro__review ans">
                                        <div class="review__thumb">
                                            <img src="{{ asset('tshop/assets/images/review/2.jpg') }}" alt="review images">
                                        </div>
                                        <div class="review__details">
                                            <div class="review__info">
                                                <h4><a href="#">Gerald Barnes</a></h4>
                                                <ul class="rating">
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star-half"></i></li>
                                                    <li><i class="zmdi zmdi-star-half"></i></li>
                                                </ul>
                                                <div class="rating__send">
                                                    <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                </div>
                                            </div>
                                            <div class="review__date">
                                                <span>27 Jun, 2016 at 2:30pm</span>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas
                                                elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent
                                                et messages in con sectetur posuere dolor non.</p>
                                        </div>
                                    </div>
                                    <!-- End Single Review -->
                                </div>
                                <!-- Start RAting Area -->
                                <div class="rating__wrap">
                                    <h2 class="rating-title">Write A review</h2>
                                    <h4 class="rating-title-2">Your Rating</h4>
                                    <div class="rating__list">
                                        <!-- Start Single List -->
                                        <ul class="rating">
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                        </ul>
                                        <!-- End Single List -->
                                        <!-- Start Single List -->
                                        <ul class="rating">
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                        </ul>
                                        <!-- End Single List -->
                                        <!-- Start Single List -->
                                        <ul class="rating">
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                        </ul>
                                        <!-- End Single List -->
                                        <!-- Start Single List -->
                                        <ul class="rating">
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                        </ul>
                                        <!-- End Single List -->
                                        <!-- Start Single List -->
                                        <ul class="rating">
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                            <li><i class="zmdi zmdi-star-half"></i></li>
                                        </ul>
                                        <!-- End Single List -->
                                    </div>
                                </div>
                                <!-- End RAting Area -->
                                <div class="review__box">
                                    <form id="review-form">
                                        <div class="single-review-form">
                                            <div class="review-box name">
                                                <input type="text" placeholder="Type your name">
                                                <input type="email" placeholder="Type your email">
                                            </div>
                                        </div>
                                        <div class="single-review-form">
                                            <div class="review-box message">
                                                <textarea placeholder="Write your review"></textarea>
                                            </div>
                                        </div>
                                        <div class="review-btn">
                                            <a class="fv-btn" href="#">submit review</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
@endsection