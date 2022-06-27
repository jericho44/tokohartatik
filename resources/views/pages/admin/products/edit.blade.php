@extends('layouts.admin.main');

@section('title', 'Ubah Produk');

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-9">
            <div class="card card-default">
                <div class="card-header card-header-border-botom">
                    <strong>Ubah Produk ({{ $product->name }})</strong>
                </div>
                <div class="card-body">
                    @include('includes.admin.flash')
                    <form action="{{ route('products.update', $product->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="type" class="form-control-label">Type :</label>
                            {!! Form::select('type', $types , $product->type, ['class' => 'form-control product-type',
                            'placeholder' => '-- Pilih Tipe Produk --', 'disabled' => !empty($product)]) !!}
                        </div>
                        <div class="form-group">
                            <label for="sku" class="form-control-label">SKU</label>
                            <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
                                value="{{ old('sku') ? old('sku') : $product->sku }}" placeholder="Stock Keeping Unit">
                            @error('sku')<div class="text-muted">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') ? old('name') : $product->name }}" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-control-label">Kategori</label>
                            {!! General::selectMultiLevel('category_ids[]', $categories, ['class' => 'custom-select',
                            'multiple' => true, 'selected'
                            => !empty(old('category_ids')) ? old('category_ids') : $categoryIDs, 'placeholder' => '--
                            Pilih Kategori --']) !!}
                        </div>
                        <div class="configurable-attributes">
                            @if (!empty($configurableAttributes) && empty($product))
                                <p class="text-primary mt-4">Configurable Attributes</p>
                                <hr />
                                    @foreach ($configurableAttributes as $attribute)
                                    <div class="form-group">
                                        {!! Form::label($attribute->code, $attribute->name) !!}
                                        {!! Form::select($attribute->code. '[]', $attribute->attributeOptions->pluck('name','id'), null, ['class' =>
                                        'form-control', 'multiple' => true]) !!}
                                    </div>
                                    @endforeach
                            @endif
                        </div>
                        
                        @if ($product)
                            @if ($product->type == 'configurable')
                                @include('pages.admin.products.configurable')
                            @else
                                @include('pages.admin.products.simple')
                            @endif
                        @endif
                        <div class="form-group">
                            <label for="short_description" class="form-control-label">Deskripsi Singkat</label>
                            <textarea name="short_description" id="short_description" class="form-control h-100"
                                rows="3">{{ old('short_description') ? old('short_description') : $product->short_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control h-100" rows="3">{{ old('description') ? old('description') : $product->description }}</textarea>  @error('description')<div class="text-muted">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-control-label">Status</label>
                            {!! Form::select('status', $statuses , $product->status, ['class' => 'form-control',
                            'selected',
                            'placeholder'
                            =>
                            '-- Set Status --']) !!}
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Ubah Produk</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-block">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection