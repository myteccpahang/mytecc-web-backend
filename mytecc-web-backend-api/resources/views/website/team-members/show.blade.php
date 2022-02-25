@extends('layouts.app')
@section('title', 'Team Members')
@section('content')
<div class="container">

    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-danger">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Website</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>View Profile</h4>
                        <div>
                            <a href="{{ route('website.teamMembers.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-5">
                    <img src="{{ asset($member->img) }}" class="form-control mx-auto d-block mb-3" style="width:20%; height:20%;" alt="{{ $member->name }}">
                    <div class="form-group mb-2">
                        <label for="link_name">Name</label>
                        <input type="text" value="{{ $member->name }}" class="form-control" id="link_name" readonly>
                    </div>
                    <div class="form-group mb-2">
                        <label for="link_url">Role</label>
                        <input type="text" value="{{ $member->role }}" class="form-control" id="link_url" readonly>
                    </div>
                    <div class="form-group mb-2">
                        <label for="link_url">Session</label>
                        <input type="text" value="{{ $member->session }}" class="form-control" id="link_url" readonly>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="form-group col-md-6">
                            <label for="index">Phone</label>
                            <input type="text" value="{{ $member->phone }}" class="form-control" id="index" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="basic-addon2">Instagram</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" value="{{ $member->instagram }}" class="form-control" aria-describedby="basic-addon1" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-4">
                        <div class="form-group col-md-6">
                            <label for="index">Index</label>
                            <input type="number" value="{{ $member->index }}" class="form-control" id="index" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <input type="text" value="{{ $member->status }}" class="form-control" id="status" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
