@extends('layouts.app')
@section('title', 'Edit Link')
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
                        <h4>Edit Link</h4>
                        <div>
                            <a href="{{ route('links.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-5">
                    <form action="{{ route('links.update', $link->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-2 col-md-6">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">#</span>
                                <input type="text" value="{{ $link->id }}" class="form-control" aria-describedby="basic-addon1" readonly>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label for="link_name">Link Name</label>
                            <input type="text" value="{{ (old('link_name')) ? old('link_name') : $link->link_name }}" class="form-control" id="link_name" placeholder="MYTECC Official Website" name="link_name">
                            @if ($errors->any('link_name'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('link_name') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label for="link_url">Link URL</label>
                            <input type="text" value="{{ (old('link_url')) ? old('link_url') : $link->link_url }}" class="form-control" id="link_url" placeholder="https://myteccpahang.com" name="link_url">
                            @if ($errors->any('link_url'))
                                <span class="text-danger" role="alert">
                                    {{ $errors->first('link_url') }}
                                </span>
                            @endif
                        </div>
                        <div class="row g-2 mb-4">
                            <div class="form-group col-md-6">
                                <label for="index">Index</label>
                                <input type="number" value="{{ (old('index')) ? old('index') : $link->index }}" class="form-control" id="index" placeholder="1" name="index">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
