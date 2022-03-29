@extends('layouts.admin.main')

@section('title', 'Edit Pengguna')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Pengguna</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $user->name }}" required>
                            @error('name')<div class="text-muted">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ $user->email }}" required>
                            @error('email')<div class="text-muted">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-control-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}">
                            @error('password')<div class="text-muted">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            {{-- {{ $roles['id'] }} --}}
                            <label for="roles" class="form-control-label">Role</label>
                            <select name="roles" class="form-control @error('role') is-invalid @enderror" required>
                                <option value="">-- Pilih Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->roles->pluck('id') == $role->id ? 'selected' : '' }}>{{ $role->name }}<option>
                                @endforeach
                            </select>
                            @error('role')<div class="text-muted">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection