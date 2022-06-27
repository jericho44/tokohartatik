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
                            <label for="type" class="form-control-label">Type :</label>
                            {!! Form::select('type', $types , null, ['class' => 'form-control product-type',
                            'placeholder' => '-- Pilih Tipe Produk --']) !!}
                        </div>
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
                            <label for="category" class="form-control-label">Kategori</label>
                            {!! General::selectMultiLevel('category_ids[]', $categories, ['class' => 'custom-select',
                            'multiple' => true, 'selected'
                            => !empty(old('category_ids')) ? old('category_ids') : $categoryIDs, 'placeholder' => '--
                            Pilih Kategori --']) !!}
                        </div>
                        <div class="configurable-attributes">
                            @if (!empty($configurableAttributes))
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
                        @if ($products)
                            @if ($products->type == 'configurable')
                                @include('admin.products.configurable')
                            @else
                                @include('admin.products.simple') 
                            @endif                           
                        @endif
                        <div class="form-group">
                            <label for="short_description" class="form-control-label">Deskripsi Singkat</label>
                            <textarea name="short_description" id="short_description" rows="3"
                                class="form-control @error('short_description') is-invalid @enderror"
                                placeholder="Deskripsi Singkat" style="height: 100px;">{{ old('short_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Deskripsi</label>
                            <textarea name="description" id="description" cols="30" rows="10"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Deskripsi" style="height: 100px;">{{ old('description') }}</textarea>
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

@push('after-script')
    <script>
        function showHideConfigurableAttributes() {
        var productType = $(".product-type").val();
        
            if (productType == 'configurable') {
                $(".configurable-attributes").show();
            } else {
                $(".configurable-attributes").hide();
            }
        }
        $(function(){
            showHideConfigurableAttributes();
            $(".product-type").change(function() {
                showHideConfigurableAttributes();
            });
        });
    </script>
@endpush