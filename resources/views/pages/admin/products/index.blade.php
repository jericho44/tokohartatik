@extends('layouts.admin.main')

@section('title', 'Produk')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-8 col-sm-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Produk</h2>
                </div>
                <div class="card-body">
                    @include('includes.admin.flash')
                    <table class="table table-bordered table-striped table-responsive-sm table-responsive-lg">
                        <thead>
                            <th>No</th>
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->name }}</td>
                                <td>Rp. {{ number_format($product->price) }}</td>
                                {{-- <td>{{ $product->statusLabel() }}</td> --}}
                                <td>
                                @if ($product->type == 'configurable')
                                    <span class="badge badge-info">Configurable</span>
                                    @if ($product->status == 1)
                                        <span class="badge badge-success">Aktif</span>
                                    @elseif ( $product->status == 2)
                                    <span class="badge badge-warning">NonAktif</span>
                                    @else
                                    <span class="badge badge-dark">Draft</span>
                                    @endif
                                @elseif ( $product->status == 1)
                                    <span class="badge badge-success">Aktif</span>
                                @elseif ( $product->status == 2)
                                    <span class="badge badge-warning">NonAktif</span>
                                @else
                                    <span class="badge badge-dark">Draft</span>
                                @endif
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id ) }}"
                                        class="btn btn-warning btn-sm my-1"><i class="fas fa-edit"></i> Edit</a>
                                    @can('delete_products')
                                        <form action="{{ route('products.destroy', $product->id) }}" class="d-inline"
                                            method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm my-1">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                        <form action="{{ route('products.deletePermanent', $product->id) }}" class="d-inline"
                                            method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-light btn-sm my-1" style="cursor: no-drop" title="Delete Permanent">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Produk Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
                @can('add_products')
                    <div class="card-footer text-right">
                        <a href="{{ route('products.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                            Produk</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection