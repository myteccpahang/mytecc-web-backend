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
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link link-dark" href="{{ route('website.aboutUs') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                         <a class="nav-link link-dark" href="{{ route('website.programAndActivity') }}">Program & Activity</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-dark active" href="{{ route('website.teamMembers') }}">Team Members</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                </div>
              </div>
        </div>
    </div>
</div>
@endsection