@extends('layouts.admin.main');

@section('title', 'Tambah Produk');

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-9">
            <div class="card card-default">
                <div class="card-header card-header-border-botom">
                    <h2>Tambah Produk</h2>
                </div>
                <div class="card-body">
                    @include('includes.admin.flash')
                    <form action="{{ route('products.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="sku" class="form-control-label">SKU</label>
                            <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
                                value="{{ old('sku') }}" placeholder="Stock Keeping Unit">
                            @error('sku')<div class="text-muted">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-control-label">Harga</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price') }}" placeholder="Harga" required>
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-control-label">Kategori</label>
                            {!! General::selectMultiLevel('category_ids[]', $categories, ['class' => 'form-control',
                            'multiple' => true, 'selected'
                            => !empty(old('category_ids')) ? old('category_ids') : $categoryIDs, 'placeholder' => '--
                            Pilih Kategori --']) !!}
                        </div>
                        <div class="form-group">
                            <label for="short_description" class="form-control-label">Deskripsi Singkat</label>
                            <textarea name="short_description" cols="30" rows="10"
                                class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Deskripsi</label>
                            <textarea name="description" rows="10"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="weight" class="form-control-label">Berat</label>
                            <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight"
                                value="{{ old('weight') }}" placeholder="Berat" required>
                        </div>
                        <div class="form-group">
                            <label for="length" class="form-control-label">Panjang</label>
                            <input type="text" class="form-control @error('length') is-invalid @enderror" name="length"
                                value="{{ old('length') }}" placeholder="Panjang">
                        </div>
                        <div class="form-group">
                            <label for="width" class="form-control-label">Lebar</label>
                            <input type="text" class="form-control @error('width') is-invalid @enderror" name="width"
                                value="{{ old('width') }}" placeholder="Lebar">
                        </div>
                        <div class="form-group">
                            <label for="height" class="form-control-label">Tinggi</label>
                            <input type="text" class="form-control @error('height') is-invalid @enderror" name="height"
                                value="{{ old('height') }}" placeholder="Tinggi">
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-control-label">Status</label>
                            {!! Form::select('status', $statuses , null, ['class' => 'form-control', 'placeholder' =>
                            '-- Set Status --']) !!}
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Tambah Produk</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-block">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection