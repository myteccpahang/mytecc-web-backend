@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">

    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        {{-- Links Card --}}
        <div class="col-sm-6 col-md-3 mb-3">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-link-45deg"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center">Total Links <br>on Live</p>
                            {{-- <p class="fs-2 fw-bold">{{ $links_count }}</p> --}}
                            <p class="fs-2 fw-bold">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Users Card --}}
        <div class="col-sm-6 col-md-3 mb-3">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-people"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center">Total Users <br>Registered</p>
                            <p class="fs-2 fw-bold">{{ count($users) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Products Card --}}
        <div class="col-sm-6 col-md-3 mb-3">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-shop"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center">Total Products <br>in Shop</p>
                            {{-- <p class="fs-2 fw-bold">{{ $products_count }}</p> --}}
                            <p class="fs-2 fw-bold">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Orders Card --}}
        <div class="col-sm-6 col-md-3 mb-3">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-basket"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center">Total Orders <br>Pending</p>
                            {{-- <p class="fs-2 fw-bold">{{ $orders_count }}</p> --}}
                            <p class="fs-2 fw-bold">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
