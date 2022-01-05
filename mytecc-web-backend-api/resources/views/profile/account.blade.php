@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="container">

    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-danger">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $admin->username }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Account</h4>
                        <div>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-5">
                    <div class="form-group col-md-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">#</span>
                            <input type="number" value="{{ $admin->id }}" class="form-control" aria-describedby="basic-addon1" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" value="{{ (old('username')) ? old('username') : $admin->username }}" class="form-control" id="username" readonly>
                    </div>
                    <div>
                        <form action="{{ route('account.updateAccount', $admin->id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
                            @csrf
                            @method('PUT')
                            <div class="form-group has-validation col-md-6 mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" value="{{ (old('email')) ? old('email') : $admin->email }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Email</button>
                        </form>
                    </div>
                    <hr>
                    <div class="mt-5">
                        <h5 class="mb-4">Change Password</h5>
                        <form action="{{ route('account.updatePassword', $admin->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group col-md-6 mb-3">
                                <label for="current-password">Current Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current-password" name="current_password" required>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="password">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="password-confirm">Password Confirmation <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
