<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Toko Hartatik</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Catalog</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="index-0.html">Dashboard</a></li>
                    <li class="active"><a class="nav-link" href="{{ route('products.index') }}">Produk</a></li>
                    <li class="active"><a class="nav-link" href="{{ route('categories.index') }}">Kategori</a></li>
                    <li class="active"><a class="nav-link" href="{{ route('attributes.index') }}">Atribut</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-image"></i><span>Galeri</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('products.images') }}">Produk</a></li>
                </ul>
            </li>
            <li class="menu-header">Starter</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>
    </aside>
</div>