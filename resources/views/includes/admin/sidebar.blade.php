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
                    {{-- <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="index-0.html">Dashboard</a>
                    </li> --}}
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
            <li class="nav-item dropdown {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-list"></i><span>Report</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('reports.revenue') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('reports.revenue') }}">Pendapatan</a>
                    </li>
                    <li class="{{ request()->routeIs('reports.product') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('reports.product') }}">Produk</a>
                    </li>
                    <li class="{{ request()->routeIs('reports.inventory') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('reports.inventory') }}">Inventori</a>
                    </li>
                    <li class="{{ request()->routeIs('reports.payment') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('reports.payment') }}">Pembayaran</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ request()->routeIs('products.trashed') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-trash"></i><span>Restore</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('products.trashed') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.trashed') }}">Produk</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Orders</li>
            <li class="nav-item dropdown {{ request()->routeIs('orders.*', 'shipments.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-solid fa-dollar-sign"></i><span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('orders.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('orders.index') }}">Penjualan</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('shipments.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('shipments.index') }}">Pengiriman</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('orders.trashed') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('orders.trashed') }}">Dihapus</a>
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
            {{-- <li class="menu-header">Starter</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li> --}}
    </aside>
</div>