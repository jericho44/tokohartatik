@extends('layouts.admin.main')

@section('title', 'Kategori')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Kategori</h2>
                </div>
                <div class="card-body">
                    @include('includes.admin.flash')
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Parent</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->parent ? $category->parent->name : '' }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" class="d-inline"
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
                    {{ $categories->links() }}
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                        Kategori</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection