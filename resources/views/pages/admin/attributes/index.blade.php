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
                        <table class="table table-bordered table-striped table-responsive-sm table-responsive-lg">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kode</th>
                                <th>Tipe</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($attributes as $attribute)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $attribute->name }}</td>
                                    <td>{{ $attribute->code }}</td>
                                    <td>{{ $attribute->type }}</td>
                                    <td>
                                        <a href="{{ route('attributes.edit', $attribute->id) }}" class="btn btn-warning"><i
                                            class="fas fa-edit"></i> Edit</a>
                                        <a href="{{ route('attributes.options', $attribute->id) }}" class="btn btn-success"><i class="fas fa-plus"></i> Opsi</a>
                                        @can('delete_attributes')                                            
                                            <form action="{{ route('attributes.destroy', $attribute->id) }}" class="d-inline"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger delete-confirm">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                            {{-- <form action="{{ route('attributes.deletePermanent', $attribute->id) }}" class="d-inline" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-light btn-sm my-1" style="cursor: no-drop" title="Delete Permanent">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form> --}}
                                        @endcan
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
                     @if (Auth::user()->roles[0]['name'] != "Operator")
                        @can('add_attributes')
                            <div class="card-footer text-right">
                                <a href="{{ route('attributes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                                    Atribut</a>
                            </div>
                        @endcan                      
                     @endif 
                </div>
            </div>
        </div>
    </div>
@endsection