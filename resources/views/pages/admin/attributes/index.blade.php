@extends('layouts.admin.main')

@section('title', 'Atribut Kategori')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Atribut</h2>
                    </div>
                    <div class="card-body">
                        @include('includes.admin.flash')
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($attributes as $attribute)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $attribute->code }}</td>
                                    <td>{{ $attribute->name }}</td>
                                    <td>{{ $attribute->type }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $attribute->id) }}" class="btn btn-warning"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('categories.destroy', $attribute->id) }}" class="d-inline"
                                            method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $attributes->links('pagination::bootstrap-4') }}
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('attributes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                            Atribut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection