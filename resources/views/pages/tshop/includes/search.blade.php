<div class="search__area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search__inner">
                    <form action="{{ route('shop') }}" method="get">
                        <input placeholder="Search here... " type="text" name="search" value="">
                        <button type="submit"></button>
                    </form>
                    <div class="search__close__btn">
                        <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>