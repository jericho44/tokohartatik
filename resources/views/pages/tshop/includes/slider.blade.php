<div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-left-style">
    <div class="categories-menu mrg-xs">
        <div class="category-heading">
            <h3>Kategori Produk</h3>
        </div>
        <div class="category-menu-list">
            @if ($categories)
            <ul>
                @foreach ($categories as $category)
                <li><a href="{{ url('shop?category='. $category->slug) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</div>