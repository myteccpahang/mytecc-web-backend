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
                            <a class="nav-link link-dark" href="{{ route('website.teamMembers.index') }}">Team Members</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('website.aboutUs.update', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-2">
                            <label for="title">Title</label>
                            <input type="text" value="{{ (old('title')) ? old('title') : $aboutUs->title }}" class="form-control h-100" id="title" name="title">
                            @if ($errors->any('title'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('title') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label for="description">Desription</label>
                            <textarea type="text" value="{{ (old('description')) ? old('description') : $aboutUs->description }}" style="height: 300px" class="form-control" id="description" name="description">{{ $aboutUs->description }}</textarea>
                            @if ($errors->any('description'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('description') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2 col-md-6">
                            <label for="image">Image</label>
                            <img src="{{ asset($aboutUs->image) }}" class="form-control mb-2" style="width:auto; height:200px;" id="image" name="image">
                            <input type="file" value="{{ (old('image')) ? old('image') : $aboutUs->image }}" class="form-control" id="image" name="image">
                            <span><i class="bi bi-info-circle"></i> Only accept .jpg .jpeg .png and max file size 500kb</span>
                            @if ($errors->any('image'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('image') }}
                                </span>
                            @endif
                        </div>
                        <div class="row g-2 mb-4">
                            <div class="form-group col-md-6">
                                <label for="vision">Vision</label>
                                <textarea type="text" value="{{ (old('vision')) ? old('vision') : $aboutUs->vision }}" style="height: 100px" class="form-control" id="vision" name="vision">{{ $aboutUs->vision }}</textarea>
                                @if ($errors->any('vision'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('vision') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mission">Mission</label>
                                <textarea type="text" value="{{ (old('mission')) ? old('mission') : $aboutUs->mission }}" style="height: 100px" class="form-control" id="mission" name="mission">{{ $aboutUs->mission }}</textarea>
                                @if ($errors->any('mission'))
                                    <span class="text-danger" role="alert">
                                        {{ $errors->first('mission') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ route('website.aboutUs') }}" class="btn btn-link link-danger">Cancel</a>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection