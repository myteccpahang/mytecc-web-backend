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
                            <p class="align-self-center mb-0">Total Links <br>on Live</p>
                            <p class="fs-2 fw-bold mb-0">{{ count($links) }}</p>
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
                            <p class="align-self-center mb-0">Total Users <br>Registered</p>
                            <p class="fs-2 fw-bold mb-0">{{ count($users) }}</p>
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
                            <p class="align-self-center mb-0">Total Products <br>in Shop</p>
                            {{-- <p class="fs-2 fw-bold">{{ $products_count }}</p> --}}
                            <p class="fs-2 fw-bold mb-0">0</p>
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
                            <p class="align-self-center mb-0">Total Orders <br>Pending</p>
                            {{-- <p class="fs-2 fw-bold">{{ $orders_count }}</p> --}}
                            <p class="fs-2 fw-bold mb-0">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Today Orders Card --}}
        <div class="col-md-9 mb-3">
            <div class="card bg-light shadow">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h5><i class="fs-3 bi bi-clipboard-check align-middle me-2"></i><span>Today's Orders</span></h5>
                        <span>{{ date('D, d M Y') }}</span>
                    </div>
                    <div class="card-text">
                        <p>You don't have any orders today.</p>
                        {{--<div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Username</th>
                                        <th>Product</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>syhrzkwn</td>
                                        <td>MYTECC Lanyard</td>
                                        <td class="text-center">x1</td>
                                        <td class="text-center">RM10</td>
                                        <td class="text-center"><span class="badge bg-warning text-dark">pending</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>--}}
                    </div>
                    <div>
                        <a href="#" class="btn btn-danger btn-sm mt-3">View All Orders</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Apps Env Card --}}
        <div class="col-md-3 mb-3">
            <div class="card bg-light shadow">
                <div class="card-body">
                    <h5 class="card-title mb-3">
                        <i class="fs-3 bi bi-hdd-stack align-middle me-2"></i>
                        <span>Apps Environment</span>
                    </h5>
                    <div class="card-text">
                        <p class="mb-1">
                            <a href="https://www.w3schools.com/php/" target="_blank" class="link-dark">PHP v{{ PHP_VERSION }}</a>
                        </p>
                        <p class="mb-1">
                            <a href="https://laravel.com/docs/8.x" target="_blank" class="link-dark">Laravel v{{ Illuminate\Foundation\Application::VERSION }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
