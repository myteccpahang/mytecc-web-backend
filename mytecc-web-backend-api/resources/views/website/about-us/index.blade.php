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
                            <a class="nav-link bg-dark active" href="{{ route('website.aboutUs') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                         <a class="nav-link link-dark" href="{{ route('website.programAndActivity') }}">Program & Activity</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-dark" href="{{ route('website.teamMembers') }}">Team Members</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-5">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('website.aboutUs.edit', $aboutUs->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                    </div>

                    <div class="form-group mb-2">
                        <label for="title">Title</label>
                        <input type="text" value="{{ $aboutUs->title }}" class="form-control" id="title" name="title" readonly>
                    </div>
                    <div class="form-group mb-2">
                        <label for="description">Desription</label>
                        <textarea type="text" style="height: 350px" class="form-control" id="description" name="description" readonly>{{ $aboutUs->description }}</textarea>
                    </div>
                    <div class="form-group mb-2 col-md-6">
                        <label for="image">Image</label>
                        <img src="{{ asset($aboutUs->image) }}" class="form-control" style="width:auto; height:200px;" id="image" name="image">
                    </div>
                    <div class="row g-2 mb-4">
                        <div class="form-group col-md-6">
                            <label for="vision">Vision</label>
                            <textarea type="text" style="height: 120px" class="form-control" id="vision" name="vision" readonly>{{ $aboutUs->vision }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mission">Mission</label>
                            <textarea type="text" style="height: 120px" class="form-control" id="mission" name="mission" readonly>{{ $aboutUs->mission }}</textarea>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection