@extends('layouts.app')
@section('title', 'Users')
@section('content')
<div class="container">

    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-danger">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Users</h4>
                        <div>
                            <a href="{{ route('users.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> User</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="w-100 table">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Userame</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count())
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="align-middle text-center">{{ $user->id }}</td>
                                            <td class="align-middle">{{ $user->username }}</td>
                                            <td class="align-middle">{{ $user->first_name }}</td>
                                            <td class="align-middle">{{ $user->last_name }}</td>
                                            <td class="align-middle"><a href="mailto:{{ $user->email }}" class="link-danger">{{ $user->email }}</a></td>
                                            <td class="align-middle"><a href="tel:{{ $user->phone }}" class="link-danger">{{ $user->phone }}</a></td>
                                            <td class="align-middle text-center">
                                                @if ($user->status == "Enabled")
                                                    <span class="badge rounded-pill bg-success">{{ $user->status }}</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">{{ $user->status }}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="{{ route('users.show', $user->id) }}" class="dropdown-item" type="button">View</a></li>
                                                        <li><a href="{{ route('users.edit', $user->id) }}" class="dropdown-item" type="button">Edit</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="align-middle text-center py-3">There is no data</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <small>Showing {{$users->count()}} of {{ $users->total() }} user(s).</small>
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection