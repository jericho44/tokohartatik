@extends('layouts.admin.main')

@section('title', 'Tambah Foto Produk')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Upload Image <small>{{ $product->name }}</small></h2>
                    </div>
                    <div class="card-body">
                        @if ( $product->status == 1)
                            <span class="badge badge-success float-right mb-2">Aktif</span>
                        @elseif ( $product->status == 2)
                            <span class="badge badge-warning float-right mb-2">NonAktif</span>
                        @else
                            <span class="badge badge-dark float-right mb-2">Draft</span>
                        @endif
                        @include('includes.admin.flash')
                        <form action="{{ route('products.upload_image', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-control-label">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}" readonly disabled>
                            </div>
                            <div class="form-group">
                                <label for="sku" class="form-control-label">SKU</label>
                                <input type="text" class="form-control" name="sku" value="{{ $product->sku }}" readonly disabled>
                            </div>
                            <div class="form-group">
                                <label for="price" class="form-control-label">Harga</label>
                                <input type="text" class="form-control" name="price" value="{{ number_format($product->price) }}" readonly disabled>
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-control-label">Foto Produk</label>
                                <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" placeholder="Foto Produk" accept="image/*" required>
                                @error('image')<div class="text-muted">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Tambah</button>
                                <a href="{{ route('products.images') }}" class="btn btn-secondary btn-block">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection