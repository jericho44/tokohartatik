<div class="shopping__cart">
    <div class="shopping__cart__inner">
        <div class="offsetmenu__close__btn">
            <a href="#"><i class="zmdi zmdi-close"></i></a>
        </div>
        @if (!\Cart::isEmpty())
        <div class="shp__cart__wrap">
            @foreach (\Cart::getContent() as $item)
            @php
                $product = isset($item->associatedModel->parent) ? $item->associatedModel->parent : $item->associatedModel;
                $image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) :
                asset('tshop/assets/images/product/sm-img/1.jpg')
            @endphp
                <div class="shp__single__product">
                    <div class="shp__pro__thumb">
                        <a href="{{ url('shop/'. $product->slug) }}">
                            <img src="{{ $image }}" alt="{{ $product->name }}" style="width:100px">
                        </a>
                    </div>
                    <div class="shp__pro__details">
                        <h2><a href="{{ url('shop/'. $product->slug) }}">{{ $item->name }}</a></h2>
                        <span class="quantity">Jumlah : {{ $item->quantity }}</span>
                        <span class="shp__price">{{ number_format($item->price) }} x {{ $item->quantity }}</span>
                    </div>
                    <div class="remove__btn">
                        <a href="{{ url('carts/remove/'. $item->id)}}" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
             @endforeach
            </div>
            <ul class="shoping__total">
                <li class="subtotal">Subtotal:</li>
                <li class="total__price">{{ number_format(\Cart::getSubTotal()) }}</li>
            </ul>
            <ul class="shopping__btn">
                <li><a href="{{ route('carts') }}">View Cart</a></li>
                <li class="shp__checkout"><a href="{{ route('orders.checkout') }}">Checkout</a></li>
            </ul>
        @endif
    </div>
</div>