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
                        @if ($sizes)
                        <div class="sidebar-widget mb-40">
                            <h2 class="sidebar-title">size</h2>
                            <div class="product-size">
                                <ul>
                                    @foreach ($sizes as $size)
                                    <li><a href="{{ url('shop?option='. $size->id) }}">{{ $size->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="single__filter">
                        @if ($colors)
                        <div class="sidebar-widget sidebar-overflow mb-45">
                            <h2 class="sidebar-title">Warna</h2>
                            <div class="sidebar-categories">
                                <ul>
                                    @foreach ($colors as $color)
                                    <li><a href="{{ url('shop?option='. $color->id) }}">{{ $color->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- End Single Content -->
            </div>
        </div>
    </div>
</div>