@extends('layouts.app')
@section('title', 'Edit User')
@section('content')
<div class="container">

    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-danger">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="link-danger">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $user->id }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Edit Users</h4>
                        <div>
                            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-5">
                    <form action="{{ route('users.update.account', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <h5 class="mb-4">Account</h5>
                        <div class="form-group mb-2 col-md-6">
                            <label for="email">Email</label>
                            <input type="email" value="{{ (old('email')) ? old('email') : $user->email }}" class="form-control" id="email" name="email" required>
                            @if ($errors->any('email'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2 col-md-6">
                            <label for="username">Username</label>
                            <input type="text" value="{{ (old('username')) ? old('username') : $user->username }}" class="form-control" id="username" name="username" required>
                            @if ($errors->any('username'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('username') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label for="current-password">Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current-password" name="current_password" required>
                            @error('current_password')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mb-4">
                            <label for="password-confirm">Password Confirmation</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">Update</button>
                    </form>
                    <hr>
                    <form action="{{ route('users.update.profile', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <h5 class="mt-5 mb-4">Profile</h5>
                        <div class="row g-2 mb-4">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" value="{{ (old('first_name')) ? old('first_name') : $user->first_name }}" class="form-control" id="first_name" name="first_name">
                                @if ($errors->any('first_name'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('first_name') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" value="{{ (old('last_name')) ? old('last_name') : $user->last_name }}" class="form-control" id="last_name" name="last_name">
                                @if ($errors->any('last_name'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('last_name') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" value="{{ (old('phone')) ? old('phone') : $user->phone }}" class="form-control" id="phone" name="phone">
                                @if ($errors->any('phone'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('phone') }}
                                </span>
                            @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="Enabled">Enabled</option>
                                    <option value="Disabled">Disabled</option>
                                </select>
                                @if ($errors->any('status'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('status') }}
                                </span>
                            @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="address">Address</label>
                                <input type="address" value="{{ (old('address')) ? old('address') : $user->address }}" class="form-control" id="address" name="address">
                                @if ($errors->any('address'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('address') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="postcode">Postcode</label>
                                <input type="number" value="{{ (old('postcode')) ? old('postcode') : $user->postcode }}" class="form-control" id="postcode" name="postcode">
                                @if ($errors->any('postcode'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('postcode') }}
                                </span>
                            @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="city">City</label>
                                <input type="text" value="{{ (old('city')) ? old('city') : $user->city }}" class="form-control" id="city" name="city">
                                @if ($errors->any('city'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('city') }}
                                </span>
                            @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="state">State</label>
                                <input type="text" value="{{ (old('state')) ? old('state') : $user->state }}" class="form-control" id="state" name="state">
                                @if ($errors->any('state'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('state') }}
                                </span>
                            @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection