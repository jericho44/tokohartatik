@extends('layouts.admin.main')

@section('title', 'Order')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Restore Produk</h2>
                </div>
                <div class="card-body">
                    {{-- @include('admin.partials.flash') --}}
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>SKU</th>
                            <th>Nama</th>
                            <th>Price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>
                                    {{ $product->sku }}
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->price) }}</td>
                                <td>
                                    @can('edit_products')
                                    <a href="{{ route('products.restore', $product->id) }}"
                                        class="btn btn-info btn-sm">Restore</a>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection