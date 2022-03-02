@extends('layouts.admin.main')

@section('title', 'Tambah Atribut')

@section('content')
    <div class="card col-lg-8 col-md-6">
        <div class="card-header">
            <h2>Tambah Atribut</h2>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('attributes.store') }}" method="post">
                @include('includes.admin.flash')
                @csrf
                <legend class="col-form-label pt-3">General</legend>
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Atribut</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" required>
                    @error('name')<div class="text-muted">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="code" class="form-control-label">Code</label>
                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                        value="{{ old('code') }}" required>
                    @error('code')<div class="text-muted">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Tipe</label>
                    {!! Form::select('type', $types , null, ['class' => 'form-control', 'placeholder' =>
                    '-- Pilih Tipe --']) !!}
                </div>
                <legend class="col-form-label pt-3">Validation</legend>
                <div class="form-group">
                    <label for="is_required" class="form-control-label">Harus Diisi?</label>
                    {!! Form::select('is_required', $booleanOptions , null, ['class' => 'form-control', 'placeholder' =>
                    '-- Pilih --']) !!}
                </div>
                <div class="form-group">
                    <label for="is_uniqe" class="form-control-label">Unik Atribute</label>
                    {!! Form::select('is_uniqe', $booleanOptions , null, ['class' => 'form-control', 'placeholder' =>
                    '-- Atribute Unik --']) !!}
                </div>
                <div class="form-group">
                    <label for="validation" class="form-control-label">Persyaratan</label>
                    {!! Form::select('validation', $validations , null, ['class' => 'form-control', 'placeholder' =>
                    '-- Persyaratan --']) !!}
                </div>
                <legend class="col-form-label pt-3">Configuration</legend>
                <div class="form-group">
                    <label for="is_configurable" class="form-control-label">Sebagai Produk Konfigurasi</label>
                    {!! Form::select('is_configurable', $booleanOptions , null, ['class' => 'form-control', 'placeholder' =>
                    '-- Pilih --']) !!}
                </div>
                <div class="form-group">
                    <label for="is_filterable" class="form-control-label">Sebagai Produk Filter</label>
                    {!! Form::select('is_filterable', $booleanOptions , null, ['class' => 'form-control', 'placeholder' =>
                    '-- Pilih --']) !!}
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Kategori</button>
                    <a href="{{ route('attributes.index') }}" class="btn btn-secondary btn-block">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection