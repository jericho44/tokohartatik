@extends('layouts.admin.main')

@section('title', 'Users')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Users</h2>
                </div>
                <div class="card-body">
                    @include('includes.admin.flash')
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roles->implode('name', ', ') }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    @if (!$user->hasRole('Admin'))
                                    @can('edit_categories')
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    @endcan

                                    @can('delete_categories')
                                        <form action="{{ route('users.destroy', $user->id) }}" class="d-inline delete" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm my-1">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    @endcan
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>

                @can('add_users')
                <div class="card-footer text-right">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Add New</a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection