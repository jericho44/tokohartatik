<header id="header" class="htc-header header--3 bg__white">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <h2 style="font-size: 19px; font-weight: bold; text-align: center;">Toko Hartatik</h2>
                        </a>
                    </div>
                </div>
                <!-- Start MAinmenu Ares -->
                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                    <nav class="mainmenu__nav hidden-xs hidden-sm">
                        <ul class="main__menu">
                            <li class="drop"><a href="index.html">Home</a></li>
                            {{-- <li class="drop"><a href="portfolio-card-box-2.html">portfolio</a>
                                <ul class="dropdown">
                                    <li><a href="portfolio-card-box-2.html">portfolio</a></li>
                                    <li><a href="single-portfolio.html">Single portfolio</a></li>
                                </ul>
                            </li> --}}
                            {{-- <li class="drop"><a href="blog.html">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog.html">blog 3 column</a></li>
                                    <li><a href="blog-details.html">Blog details</a></li>
                                </ul>
                            </li> --}}
                            <li class="drop"><a href="{{ route('shop') }}">Shop</a>
                                {{-- <ul class="dropdown mega_dropdown">
                                    <!-- Start Single Mega MEnu -->
                                    <li><a class="mega__title" href="shop.html">shop layout</a>
                                        <ul class="mega__item">
                                            <li><a href="shop.html">default shop</a></li>
                                        </ul>
                                    </li>
                                    <!-- End Single Mega MEnu -->
                                    <!-- Start Single Mega MEnu -->
                                    <li><a class="mega__title" href="shop.html">product details layout</a>
                                        <ul class="mega__item">
                                            <li><a href="product-details.html">tab style 1</a></li>
                                    </li>
                                </ul> --}}
                            </li>
                            <!-- End Single Mega MEnu -->
                            <!-- Start Single Mega MEnu -->
                            {{-- <li>
                                <ul class="mega__item">
                                    <li>
                                        <div class="mega-item-img">
                                            <a href="shop.html">
                                                <img src="{{ asset('tshop/assets/images/feature-img/3.png') }}" alt="">
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li> --}}
                            <!-- End Single Mega MEnu -->
                            <li><a href="#section-contact">contact</a></li>
                        </ul>
                    </nav>
                    <div class="mobile-menu clearfix visible-xs visible-sm">
                        <nav id="mobile_dropdown">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">portfolio</a>
                                    <ul>
                                        <li><a href="portfolio-card-box-2.html">portfolio</a></li>
                                        <li><a href="single-portfolio.html">Single portfolio</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">blog</a>
                                    <ul>
                                        <li><a href="blog.html">blog 3 column</a></li>
                                        <li><a href="blog-details.html">Blog details</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">pages</a>
                                    <ul>
                                        <li><a href="about.html">about</a></li>
                                        <li><a href="customer-review.html">customer review</a></li>
                                        <li><a href="shop.html">shop</a></li>
                                        <li><a href="shop-sidebar.html">shop sidebar</a></li>
                                        <li><a href="product-details.html">product details</a></li>
                                        <li><a href="cart.html">cart</a></li>
                                        <li><a href="wishlist.html">wishlist</a></li>
                                        <li><a href="checkout.html">checkout</a></li>
                                        <li><a href="team.html">team</a></li>
                                        <li><a href="login-register.html">login & register</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End MAinmenu Ares -->
                <div class="col-md-2 col-sm-4 col-xs-3">
                    <ul class="menu-extra icon-cart-furniture">
                        @guest
							<li><a href="{{ url('login') }}">Login</a></li>
							<li><a href="{{ url('register') }}">Register</a></li>
						@else
							<li><b><a href="{{ url('profile') }}">{{ Auth::user()->first_name }}</a></b></li>
							<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						@endguest
                        <li class="search search__open hidden-xs"><i class="ti-search"></i></li>
                        <li class="cart__menu">
                            <i class="ti-shopping-cart"></i>
                            <span class="shop-count">{{ \Cart::getTotalQuantity() }}</span>
                        </li>
                        <li class="toggle__menu hidden-xs hidden-sm"><i class="ti-menu"></i></li>
                    </ul>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>