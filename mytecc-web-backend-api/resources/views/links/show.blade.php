@extends('layouts.app')
@section('title', 'Link')
@section('content')
<div class="container">

    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-danger">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('links.index') }}" class="link-danger">Links</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $link->id }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>View Link</h4>
                        <div>
                            <a href="{{ route('links.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-5">
                    <div class="form-group mb-2 col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">#</span>
                            <input type="text" value="{{ $link->id }}" class="form-control" aria-describedby="basic-addon1" readonly>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="link_name">Link Name</label>
                        <input type="text" value="{{ $link->link_name }}" class="form-control" id="link_name" readonly>
                    </div>
                    <div class="form-group mb-2">
                        <label for="link_url">Link URL</label>
                        <input type="text" value="{{ $link->link_url }}" class="form-control" id="link_url" readonly>
                    </div>
                    <div class="row g-2 mb-4">
                        <div class="form-group col-md-6">
                            <label for="index">Index</label>
                            <input type="number" value="{{ $link->index }}" class="form-control" id="index" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <input type="text" value="{{ $link->status }}" class="form-control" id="status" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
