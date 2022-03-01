@extends('layouts.admin.main')

@section('title', 'Galeri Produk')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-10 col-md-6">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Galeri Foto <small>{{ $product->name }}</small></h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-responsive-sm table-responsive-lg">
                            <thead>
                                <th>No</th>
                                <th>Tanggal Upload</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($productImage as $item)
                                   <tr>
                                       <td>{{ $loop->iteration }}</td>
                                       <td>{{ $item->created_at }}</td>
                                       <td>
                                           <img src="{{ asset('storage/'. $item->path) }}" alt="{{ $item->name }}" class="img-thumbnail" style="width: 150px">
                                       </td>
                                       <td>
                                        <form action="{{ route('products.remove_image', $item->id) }}" class="d-inline" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm my-1">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                       </td>
                                   </tr> 
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Galeri Foto Produk Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $productImage->links('pagination::bootstrap-4') }}
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('products.images')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <a href="{{ route('products.add_image', $product->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                            Foto</a>
                    </div>
                </div>
            </div>   
        </div>
    </div>
@endsection