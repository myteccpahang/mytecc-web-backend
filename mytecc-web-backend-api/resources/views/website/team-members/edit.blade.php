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
                        <h4>Edit Profile</h4>
                    </div>
                </div>

                <div class="card-body p-5">
                    <img src="{{ asset($member->img) }}" class="form-control mx-auto d-block mb-3" style="width:20%; height:20%;" alt="{{ $member->name }}">
                    <form action="{{ route('website.teamMembers.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" value="{{ (old('name')) ? old('name') : $member->name }}" class="form-control" id="name" name="name">
                            @if ($errors->any('name'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label for="role">Role</label>
                            <input type="text" value="{{ (old('role')) ? old('role') : $member->role }}" class="form-control" id="role" name="role">
                            @if ($errors->any('role'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('role') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label for="role">Image</label>
                            <input type="file" value="{{ $member->img }}" class="form-control" id="img" name="img">
                            <span><i class="bi bi-info-circle"></i> Only accept .jpg .jpeg .png and max file size 500kb</span>
                            @if ($errors->any('img'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('img') }}
                                </span>
                            @endif
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" value="{{ (old('phone')) ? old('phone') : $member->phone }}" class="form-control" id="phone" placeholder="1" name="phone">
                                @if ($errors->any('phone'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('phone') }}
                                </span>
                            @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="instagram">Instagram</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" value="{{ (old('instagram')) ? old('instagram') : $member->instagram }}" class="form-control" aria-describedby="basic-addon1" name="instagram">
                                </div>
                                @if ($errors->any('instagram'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('instagram') }}
                                </span>
                            @endif
                            </div>
                        </div>
                        <div class="row g-2 mb-4">
                            <div class="form-group col-md-6">
                                <label for="index">Index</label>
                                <input type="number" value="{{ (old('index')) ? old('index') : $member->index }}" class="form-control" id="index" placeholder="1" name="index">
                                @if ($errors->any('index'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('index') }}
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
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('website.teamMembers.index') }}" class="btn btn-link link-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
