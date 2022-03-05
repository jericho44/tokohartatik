@extends('layouts.admin.main')

@section('title' , 'Pilihan Atribut')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-5">
                @if (empty($attributeOption))
                    @include('pages.admin.attributes.create_option')
                @else
                    @include('pages.admin.attributes.edit_option')
                @endif
            </div>
            <div class="col-lg-7">
                <div class="card card-default">
                    <div class="card-header card-header-bottom-border">
                        <h2>Pilihan dari Atribut <small>{{ $attribute->name }}</small></h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-responsive-sm table-responsive-lg">
                            <thead>
                                <th style="width: 10%">No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($attribute->attributeOptions as $option)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $option->name }}</td>
                                        <td>
                                            <a href="{{ route('attributes.edit_option', $option->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                            <form action="{{ route('attributes.remove_option', $option->id) }}" class="d-inline"
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
                                        <td colspan="3" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection