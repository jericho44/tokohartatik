@extends('layouts.admin.main')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Tambah User</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="first_name" class="form-control-label">Name</label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name') }}" required>
                            @error('first_name')<div class="text-muted">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required>
                            @error('email')<div class="text-muted">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-control-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}" required>
                            @error('password')<div class="text-muted">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="roles" class="form-control-label">Role</label>
                            <select name="roles" class="form-control @error('role') is-invalid @enderror" required>
                                <option value="">-- Pilih Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')<div class="text-muted">{{ $message }}</div>@enderror
                        </div>
                    <!--Submit Form Button -->
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Create</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary btn-block">Back</a>
                        </div>
                    </form>
                    
                    <!-- Permissions -->
                    @if(isset($user))
                    <div class="form-group">
                        <label>Override Permissions</label>
                    </div>
                    <div class="row">
                        @foreach($permissions as $perm)
                        <?php
                                    $per_found = null;
                                    if( isset($role) ) {
                                        $per_found = $role->hasPermissionTo($perm->name);
                                    }
                                    if( isset($user)) {
                                        $per_found = $user->hasDirectPermission($perm->name);
                                    }
                                ?>
                    
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label class="{{ Str::contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                                    {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!} {{
                                    $perm->name }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection