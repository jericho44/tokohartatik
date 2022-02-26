@extends('layouts.admin.main')

@section('title', 'Foto Produk')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Foto Produk</h2>
                </div>
                <div class="card-body">
                    @include('includes.admin.flash')
                    <table class="table table-bordered table-striped table-responsive-sm table-responsive-lg">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Tanggal Upload</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @forelse ($product->productImages as $created)
                                        {{ $created['created_at'] }}
                                    @empty
                                    <span class="text-center">Belum upload Foto</span>
                                    @endforelse
                                </td>
                                {{-- <td>{{ $product->statusLabel() }}</td> --}}
                                <td>
                                    @forelse ($product->productImages as $image)
                                    <a href="{{ $product->id }}" class="btn btn-info btn-sm my-1 text-center"><i class="fas fa-eye" style="cursor: "></i> Lihat</a>     
                                    @empty
                                    <span class="text-center">Belum ada Foto</span>     
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{ route('products.add_image', $product->id) }}" class="btn btn-primary btn-sm my-1"><i class="fas fa-plus" title="Tambah Foto"></i> Tambah</a>
                                    <a href="{{ route('products.edit', $product->id ) }}"
                                        class="btn btn-warning btn-sm my-1"><i class="fas fa-edit"></i> Edit</a>
                                    {{-- <a href="{{ route('products.viewDetail', $product->id ) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>Lihat</a> --}}
                                    {{-- @can('delete_products') --}}
                                    <form action="{{ route('products.destroy', $product->id) }}" class="d-inline"
                                        method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm my-1">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                    <form action="{{ route('products.deletePermanent', $product->id) }}"
                                        class="d-inline" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-light btn-sm my-1" style="cursor: no-drop" title="Delete Permanent">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    {{-- @endcan --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Foto Produk Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
                {{-- @can('add_products') --}}
                {{-- @endcan --}}
            </div>
        </div>
    </div>
</div>
@endsection