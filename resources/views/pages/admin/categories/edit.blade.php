@extends('layouts.admin.main')

@section('title', 'Tambah Kategori')

@section('content')
<div class="card col-lg-8 col-md-6">
    <div class="card-header">
        <strong>Ubah Kategori
            ({{ $category->name }})
        </strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @include('includes.admin.flash')
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="form-control-label">Nama Kategori</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ $category->name , old('name') }}" required>
                @error('name')<div class="text-muted">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="parent_id" class="form-control-label">Parent</label>
                {!! General::selectMultiLevel('parent_id', $categories, ['class' => 'form-control', 'selected'=>
                !empty(old('parent_id') ? old('parent_id') : !empty($category['parent_id']) ? $category['parent_id']
                : ''), 'placeholder'=> '-- Choose Category --']) !!}
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Ubah Kategori</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-block">Kembali</a>
            </div>
        </form>
    </div>
</div>

@endsection