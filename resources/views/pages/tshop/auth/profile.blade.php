@extends('pages.tshop.layout')

@section('title', 'Profile')

@section('content')
<div class="wrapper fixed__footer">
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area"
        style="background: rgba(0, 0, 0, 0) url({{ asset('tshop/assets/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Profile</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">Profile</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <div class="cart-main-area ptb--120 bg__white">
        <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            @include('pages.tshop.includes.user_menu')
                        </div>
                        <div class="col-lg-9">
                            {{-- @include('admin.partials.flash') --}}
                            <div class="login">
                                <div class="login-form-container">
                                    <div class="login-form">
                                        {!! Form::model($user, ['url' => ['profile']]) !!}
                                        @csrf
                
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First
                                                name', 'required' => true]) !!}
                                                @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last
                                                name', 'required' => true]) !!}
                                                @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                {!! Form::text('company', null, ['placeholder' => 'Company']) !!}
                                                @error('company')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                {!! Form::text('address1', null, ['required' => true, 'placeholder' => 'Home number and
                                                street name']) !!}
                                                @error('address1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                {!! Form::text('address2', null, ['placeholder' => 'Apartment, suite, unit etc.
                                                (optional)']) !!}
                                                @error('address2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                {!! Form::select('province_id', $provinces, Auth::user()->province_id, ['id' =>
                                                'user-province-id', 'placeholder' => '- Please Select - ', 'required' => true, 'class' => 'custom-select custom-select-lg mb-3']) !!}
                                                @error('province_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                {!! Form::select('city_id', $cities, null, ['id' => 'user-city-id', 'placeholder' => '-
                                                Please Select -', 'required' => true, 'class' => 'custom-select custom-select-lg mb-3'])!!}
                                                @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                {!! Form::number('postcode', null, ['required' => true, 'placeholder' => 'Postcode'])
                                                !!}
                                                @error('postcode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                {!! Form::text('phone', null, ['required' => true, 'placeholder' => 'Phone']) !!}
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email',
                                                'required' => true]) !!}
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="button-box">
                                            <button type="submit" class="btn btn-primary">Update Profile</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection