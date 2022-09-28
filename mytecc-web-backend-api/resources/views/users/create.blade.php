@extends('layouts.app')
@section('title', 'Create User')
@section('content')
<div class="container">

    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-danger">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="link-danger">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Users</h4>
                </div>

                <div class="card-body p-5">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="mb-4">Account</h5>
                        <div class="form-group mb-2 col-md-6">
                            <label for="email">Email</label>
                            <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" required>
                            @if ($errors->any('email'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2 col-md-6">
                            <label for="username">Username</label>
                            <input type="text" value="{{ old('username') }}" class="form-control" id="username" name="username" required>
                            @if ($errors->any('username'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('username') }}
                                </span>
                            @endif
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
                        <div class="form-group col-md-6 mb-5">
                            <label for="password-confirm">Password Confirmation</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                        </div>
                        <hr>
                        <h5 class="mt-5 mb-4">Profile</h5>
                        <div class="row g-2 mb-5">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" value="{{ old('first_name') }}" class="form-control" id="first_name" name="first_name">
                                @if ($errors->any('first_name'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('first_name') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" value="{{ old('last_name') }}" class="form-control" id="last_name" name="last_name">
                                @if ($errors->any('last_name'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('last_name') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" value="{{ old('phone') }}" class="form-control" id="phone" name="phone">
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
                                <label for="address">Address line 1</label>
                                <input type="address" value="{{ old('address') }}" class="form-control" id="address" name="address">
                                @if ($errors->any('address'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('address') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="address2">Address line 2 <span class="text-muted">(optional)</span></label>
                                <input value="{{ old('address2') }}" class="form-control" id="address2" name="address2">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="postcode">Postcode</label>
                                <input type="number" value="{{ old('postcode') }}" class="form-control" id="postcode" name="postcode">
                                @if ($errors->any('postcode'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('postcode') }}
                                </span>
                            @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="city">City</label>
                                <input type="text" value="{{ old('city') }}" class="form-control" id="city" name="city">
                                @if ($errors->any('city'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('city') }}
                                </span>
                            @endif
                            </div>
                            {{-- Add select option for state --}}
                            <div class="form-group col-md-4">
                                <label for="state">State</label>
                                <select name="state" id="state" class="form-select">
                                    <option value="null">Select state</option>
                                    <option value="Johor">Johor</option>
                                    <option value="Kedah">Kedah</option>
                                    <option value="Kelantan">Kelantan</option>
                                    <option value="Melaka">Melaka</option>
                                    <option value="N. Sembilan">N. Sembilan</option>
                                    <option value="Pahang">Pahang</option>
                                    <option value="P. Pinang">P. Pinang</option>
                                    <option value="Perak">Perak</option>
                                    <option value="Perlis">Perlis</option>
                                    <option value="Sabah">Sabah</option>
                                    <option value="Sarawak">Sarawak</option>
                                    <option value="Selangor">Selangor</option>
                                    <option value="Terengganu">Terengganu</option>
                                    <option value="WP Kuala Lumpur">WP Kuala Lumpur</option>
                                    <option value="WP Labuan">WP Labuan</option>
                                    <option value="WP Putrajaya">WP Putrajaya</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ route('users.index') }}" class="btn btn-link link-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
