<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Toko Hartatik</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ request()->routeIs('dashboard', 'products.index' , 'products.edit' , 'products.create', 'categories.*' , 'attributes.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Catalog</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="index-0.html">Dashboard</a>
                    </li>
                    <li class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
                    </li>
                    <li class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('categories.index') }}">Kategori</a>
                    </li>
                    <li class="{{ request()->routeIs('attributes.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('attributes.index') }}">Atribut</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ request()->routeIs('products.images') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-image"></i><span>Galeri</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('products.images') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.images') }}">Produk</a>
                    </li>
                </ul>
            </li>
            @can('add_roles')                
            <hr>
            <li class="menu-header">Permission</li>
            <li class="nav-item dropdown {{ request()->routeIs('roles.*', 'users.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-solid fa-user-lock"></i><span>Users & Roles</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('roles.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                    </li>
                </ul>
            </li>
            @endcan
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