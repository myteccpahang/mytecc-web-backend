@extends('layouts.app')
@section('title', 'View User')
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
                        <h4>View Users</h4>
                        <div>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-5">
                    <h5 class="mb-4">Account</h5>
                    <div class="form-group mb-2 col-md-6">
                        <label for="email">Email</label>
                        <input type="email" value="{{ $user->email }}" class="form-control" id="email" readonly>
                    </div>
                    <div class="form-group mb-2 col-md-6 mb-5">
                        <label for="username">Username</label>
                        <input type="text" value="{{ $user->username }}" class="form-control" id="username" readonly>
                    </div>
                    <hr>
                    <h5 class="mt-5 mb-4">Profile</h5>
                    <div class="row g-2 mb-5">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name</label>
                            <input type="text" value="{{ $user->first_name }}" class="form-control" id="first_name" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" value="{{ $user->last_name }}" class="form-control" id="last_name" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" value="{{ $user->phone }}" class="form-control" id="phone" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-select" disabled>
                                <option value="Enabled" {{ $user->status == 'Enabled' ? 'selected' : '' }}>Enabled</option>
                                <option value="Disabled" {{ $user->status == 'Disabled' ? 'selected' : '' }}>Disabled</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="address">Address</label>
                            <input type="address" value="{{ $user->address }}" class="form-control" id="address" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="postcode">Postcode</label>
                            <input type="number" value="{{ $user->postcode }}" class="form-control" id="postcode" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <input type="text" value="{{ $user->city }}" class="form-control" id="city" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state">State</label>
                            <input type="text" value="{{ $user->state }}" class="form-control" id="state" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection