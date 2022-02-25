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
                        <h4>Add Team Member</h4>
                    </div>
                </div>

                <div class="card-body p-5">
                    <form action="{{ route('website.teamMembers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" value="{{ old('name')}}" class="form-control" id="name" name="name">
                            @if ($errors->any('name'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label for="role">Role</label>
                            <input type="text" value="{{ old('role') }}" class="form-control" id="role" name="role">
                            @if ($errors->any('role'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('role') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label for="session">Session</label>
                            <input type="text" value="{{ old('session') }}" class="form-control" id="session" name="session">
                            @if ($errors->any('session'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('session') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label for="role">Image</label>
                            <input type="file" value="{{ old('img') }}" class="form-control" id="img" name="img">
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
                                <input type="text" value="{{ old('phone') }}" class="form-control" id="phone" name="phone">
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
                                    <input type="text" value="{{ old('instagram') }}" class="form-control" aria-describedby="basic-addon1" name="instagram">
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
                                <input type="number" value="{{ old('index') }}" class="form-control" id="index" name="index">
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
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ route('website.teamMembers.index') }}" class="btn btn-link link-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
