<div class="row">
    <div class="col-md-12">
        <div class="filter__menu__container">
            @if ($categories)
            <div class="product__menu">
                <a data-filter="*" class="btn btn-lg is-checked" href="{{ route('shop') }}">All</a>
                @foreach ($categories as $category)
                <a data-filter=".cat--1" href="{{ url('shop?category='. $category->slug) }}">{{ $category->name }}</a>
                @endforeach
            </div>   
            @endif
            <div style="display: flex; align-content: flex-start">
                <label style="width: 100px; font-weight: normal">Sort By : </label>
                {{ Form::select('sort', $sorts , $selectedSort ,array('onChange' => 'this.options[this.selectedIndex].value &&
                                (window.location = this.options[this.selectedIndex].value);')) }}
            </div>
            <div class="filter__box">
                <a class="filter__menu" href="#">filter</a>
            </div>
        </div>
    </div>
</div>