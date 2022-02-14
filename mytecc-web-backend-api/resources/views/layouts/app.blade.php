<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Admin</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #eee;">
    <div id="app">
        <div class="container-fluid">
            <div class="row flex-nowrap">

                <!-- Sidebar -->
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="{{ route('dashboard') }}" class="mx-auto d-block my-3 text-decoration-none">
                            <img src="{{ asset('img/mytecc-logo-navbar.png') }}" alt="MYTECC Logo">
                        </a>

                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li>
                                <a href="{{ route('dashboard') }}" class="nav-link px-0 align-middle link-danger">
                                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('links.index') }}" class="nav-link px-0 align-middle link-danger">
                                    <i class="fs-4 bi bi-link-45deg"></i>
                                    <span class="ms-1 d-none d-sm-inline">Links</span>
                                </a>
                            </li>
                            {{-- Web CMS --}}
                            <li>
                                <a href="{{ route('website.aboutUs') }}" class="nav-link px-0 align-middle link-danger">
                                    <i class="fs-4 bi bi-laptop"></i>
                                    <span class="ms-1 d-none d-sm-inline">Website</span>
                                </a>
                            </li>
                            {{-- For future referances --}}
                            {{-- <li>
                                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle link-danger">
                                    <i class="fs-4 bi bi-laptop"></i>
                                    <span class="ms-1 d-none d-sm-inline">Website</span>
                                </a>
                                <ul class="collapse show nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href="{{ route('website.aboutUs') }}" class="nav-link px-0">
                                            <span class="d-none d-sm-inline link-danger">Pages</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- ecommerce section --}}
                            <li>
                                <a href="#submenu3" class="nav-link px-0 align-middle link-danger disabled">
                                    <i class="fs-4 bi-people"></i>
                                    <span class="ms-1 d-none d-sm-inline">Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="#submenu3" class="nav-link px-0 align-middle link-danger disabled">
                                    <i class="fs-4 bi bi-shop"></i>
                                    <span class="ms-1 d-none d-sm-inline">Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="#submenu4" class="nav-link px-0 align-middle link-danger disabled">
                                    <i class="fs-4 bi bi-bag"></i>
                                    <span class="ms-1 d-none d-sm-inline">Orders</span>
                                </a>
                            </li>
                            <li>
                        </ul>
                    </div>
                </div>

                <div class="col pb-3">

                    <!-- Navbar -->
                    <nav class="row navbar navbar-expand-md navbar-light bg-light shadow-sm">
                        <div class="container">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav me-auto">
                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    {{-- @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="btn btn-outline-danger px-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else --}}
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <span><i class="fs-4 bi bi-person-circle align-middle me-1"></i> {{ Auth::user()->username }}</span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('account.show' , $id = Auth::id()) }}">Account</a>
                                                <hr class="dropdown-divider">
                                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    {{-- @endguest --}}
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <main class="py-4">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fs-5 bi bi-check-circle-fill align-middle"></i>
                                <span> {{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fs-5 bi bi-exclamation-circle-fill align-middle"></i>
                                <span> {{ session('error') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
