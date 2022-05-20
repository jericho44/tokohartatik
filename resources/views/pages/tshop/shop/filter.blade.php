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
                        <h2>Sort By</h2>
                        <h3 class="sidebar-tittle">Kategori</h3>
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
                        <h2>Price</h2>
                        <ul class="filter__list">
                            <li><a href="#">$0.00 - $50.00</a></li>
                            <li><a href="#">$50.00 - $100.00</a></li>
                            <li><a href="#">$100.00 - $150.00</a></li>
                            <li><a href="#">$150.00 - $200.00</a></li>
                            <li><a href="#">$300.00 - $500.00</a></li>
                            <li><a href="#">$500.00 - $700.00</a></li>
                        </ul>
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