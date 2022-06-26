<div class="sidebar-widget mb-45">
    <h3 class="sidebar-title">User Menu</h3>
    <div class="sidebar-categories">
        <ul>
            <li><a href="{{ url('profile') }}">Profile</a></li>
            <li><a href="{{ url('orders') }}">Orders</a></li>
            <li><a href="{{ url('favorites') }}">Favorites</a></li>
            @role('Admin||!= User')
            <li><a href="{{ url('admin/dashboard') }}">Dasboard</a></li>
            @endrole
        </ul>
    </div>
</div>