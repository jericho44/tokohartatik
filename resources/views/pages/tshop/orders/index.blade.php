@extends('pages.tshop.layout')

@section('title', 'Order')

@section('content')
<div class="wrapper fixed__footer">
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area"
        style="background: rgba(0, 0, 0, 0) url({{ asset('tshop/assets/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Order</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Order</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
				<div class="col-lg-3">
					@include('pages.tshop.includes.user_menu')
				</div>
				<div class="col-lg-9">
					{{-- @include('admin.partials.flash') --}}
					<div class="shop-product-wrapper res-xl">
						<div class="table-content table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<th>Order ID</th>
									<th>Grand Total</th>
									<th>Status</th>
									<th>Payment</th>
									<th>Action</th>
								</thead>
								<tbody>
									@forelse ($orders as $order)
										<tr>    
											<td>
												{{ $order->code }}<br>
												<span style="font-size: 12px; font-weight: normal"> {{\General::datetimeFormat($order->order_date) }}</span>
											</td>
											<td>{{\General::priceFormat($order->grand_total) }}</td>
											<td>{{ $order->status }}</td>
											<td>{{ $order->payment_status }}</td>
											<td>
												<a href="{{ url('orders/'. $order->id) }}" class="btn btn-info btn-sm">details</a>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="5">No records found</td>
										</tr>
									@endforelse
								</tbody>
							</table>
							{{ $orders->links() }}
						</div>
					</div>
				</div>
			</div>
            </div>
    </div>
</div>

@endsection