<div class="filter__wrap">
    <div class="filter__cart">
        <div class="filter__cart__inner">
            <div class="filter__menu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <div class="filter__content">
                <!-- Start Single Content -->
                <div class="fiter__content__inner">
                    @if ($categories)
                    <div class="single__filter">
                        <h2 class="sidebar-tittle">Kategori</h2>
                        <div class="sidebar-categories">
                            <ul class="filter__list">
                                @foreach ($categories as $category)
                                <li><a href="{{ url('shop?category='. $category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="single__filter">
                        <h2>Size</h2>
                        <ul class="filter__list">
                            <li><a href="#xxl">XXL</a></li>
                            <li><a href="#xl">XL</a></li>
                            <li><a href="#x">X</a></li>
                            <li><a href="#l">L</a></li>
                            <li><a href="#m">M</a></li>
                            <li><a href="#s">S</a></li>
                        </ul>
                    </div>
                    <div class="single__filter">
                        <h2>Tags</h2>
                        <ul class="filter__list">
                            <li><a href="#">All</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Bags</a></li>
                            <li><a href="#">Chair</a></li>
                            <li><a href="#">Decoration</a></li>
                            <li><a href="#">Fashion</a></li>
                        </ul>
                    </div>
                    <div class="single__filter">
                        <form method="GET" action="{{ url('shop')}}">
                            <div class="sidebar-widget mb-40">
                                <h2 class="sidebar-title">Filter Harga</h2>
                                <div class="price_filter">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <label>Harga : </label>
                                            <input type="text" id="amount" name="price" placeholder="Add Your Price" style="width:170px" />
                                            <input type="hidden" id="productMinPrice" value="{{ $minPrice }}" />
                                            <input type="hidden" id="productMaxPrice" value="{{ $maxPrice }}" />
                                        </div>
                                        <button type="submit" class="btn btn-default">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="single__filter">
                        <h2>Color</h2>
                        <ul class="filter__list sidebar__list">
                            <li class="black"><a href="#"><i class="zmdi zmdi-circle"></i>Black</a></li>
                            <li class="blue"><a href="#"><i class="zmdi zmdi-circle"></i>Blue</a></li>
                            <li class="brown"><a href="#"><i class="zmdi zmdi-circle"></i>Brown</a></li>
                            <li class="red"><a href="#"><i class="zmdi zmdi-circle"></i>Red</a></li>
                            <li class="orange"><a href="#"><i class="zmdi zmdi-circle"></i>Orange</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Content -->
            </div>
        </div>
    </div>
</div>