@extends('layouts.app')
@section('title', 'Program & Activity')
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
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link link-dark" href="{{ route('website.aboutUs') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                         <a class="nav-link bg-dark active" href="{{ route('website.programAndActivity') }}">Program & Activity</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-dark" href="{{ route('website.teamMembers') }}">Team Members</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body p-5">
                    <form action="{{ route('website.programAndActivity.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Program Title</label>
                            <input type="text" value="{{ old('title') }}" class="form-control" id="title" name="title">
                            @if ($errors->any('title'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('title') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label for="description">Description</label>
                            <textarea type="text" value="{{ old('description') }}" style="height: 100px" class="form-control" id="description" name="description"></textarea>
                            @if ($errors->any('description'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('description') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label for="place">Place or Platform</label>
                            <input type="text" value="{{ old('place') }}" class="form-control" id="place" name="place">
                            @if ($errors->any('place'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('place') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label for="program_director">Program Director</label>
                            <input type="text" value="{{ old('program_director') }}" class="form-control" id="program_director" name="program_director">
                            @if ($errors->any('program_director'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('program_director') }}
                                </span>
                            @endif
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="form-group col-md-4">
                                <label for="date">Date</label>
                                <input type="date" value="{{ old('date') }}" class="form-control" id="date" name="date">
                                @if ($errors->any('index'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('date') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="start_time">Start Time</label>
                                <input type="time" value="{{ old('start_time') }}" class="form-control" id="start_time" name="start_time">
                                @if ($errors->any('start_time'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('start_time') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="end_time">End Time</label>
                                <input type="time" value="{{ old('end_time') }}" class="form-control" id="end_time" name="end_time">
                                @if ($errors->any('end_time'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('end_time') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label for="img">Image</label>
                            <input type="file" value="{{ old('img') }}" class="form-control" id="img" name="img">
                            <small><span class="text-danger">*</span>Only accept .jpg .jpeg .png and max file size 500kb</small>
                            @if ($errors->any('img'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('img') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6 mb-2">
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
                        <div class="form-group col-md-6 mb-4">
                            <label>Future <i class="bi bi-info-circle align-middle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Is this a future program?"></i></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="future" value="1" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="future" id="flexRadioDefault2" value="0" checked>
                                <label class="form-check-label" for="flexRadioDefault2">No</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ route('website.programAndActivity') }}" class="btn btn-link link-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
