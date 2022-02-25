@extends('layouts.app')
@section('title', 'About Us')
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
                            <a class="nav-link link-dark" href="{{ route('website.teamMembers.index') }}">Team Members</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-5">
                        <div class="form-group mb-2">
                            <label for="title">Program Title</label>
                            <input type="text" value="{{ $program->title }}" class="form-control" id="title" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="description">Description</label>
                            <textarea type="text" style="height: 100px" class="form-control" id="description" readonly>{{ $program->description }}</textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="place">Place or Platform</label>
                            <input type="text" value="{{ $program->place }}" class="form-control" id="place" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="program_director">Program Director</label>
                            <input type="text" value="{{ $program->program_director }}" class="form-control" id="program_director" readonly>
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="form-group col-md-4">
                                <label for="date">Date</label>
                                <input type="date" value="{{ $program->date }}" class="form-control" id="date" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="start_time">Start Time</label>
                                <input type="time" value="{{ $program->start_time }}" class="form-control" id="start_time" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="end_time">End Time</label>
                                <input type="time" value="{{ $program->end_time }}" class="form-control" id="end_time" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label for="img">Image</label>
                            <img src="{{ asset($program->img) }}" class="form-control mb-2" style="width:auto; height:200px;" id="image">
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-select">
                                @if($program->status == 'Enabled')
                                <option value="Enabled">Enabled</option>
                                @else
                                <option value="Enabled">Disabled</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-6 mb-4">
                            <label>Future <i class="bi bi-info-circle align-middle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Is this a future program?"></i></label>
                            @if($program->is_futures == 1)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="future" value="1" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Yes</label>
                            </div>
                            @else
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="future" id="flexRadioDefault2" value="0" checked>
                                <label class="form-check-label" for="flexRadioDefault2">No</label>
                            </div>
                            @endif
                        </div>
                        <a href="{{ route('website.programAndActivity') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
