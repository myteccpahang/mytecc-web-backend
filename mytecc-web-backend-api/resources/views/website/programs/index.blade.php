@extends('layouts.app')
@section('title', 'Program & Activity')
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
                            <a class="nav-link link-dark" href="{{ route('website.teamMembers') }}">Team Members</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('website.programAndActivity.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Program</a>
                    </div>

                    <div class="table-responsive">
                        <table class="w-100 table">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Program</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Start Time</th>
                                    <th class="text-center">End Time</th>
                                    <th>Program Director</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($programs->count())
                                    @foreach ($programs as $program)
                                        <tr>
                                            <td class="align-middle text-center">{{ $program->id }}</td>
                                            <td class="align-middle">{{ $program->title }}</td>
                                            <td class="align-middle text-center">{{ $program->date }}</td>
                                            <td class="align-middle text-center">{{ $program->start_time }}</td>
                                            <td class="align-middle text-center">{{ $program->end_time }}</td>
                                            <td class="align-middle">{{ $program->program_director }}</td>
                                            <td class="align-middle text-center">
                                                @if ($program->status == "Enabled")
                                                    <span class="badge rounded-pill bg-success">{{ $program->status }}</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">{{ $program->status }}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="" class="dropdown-item" type="button">View</a></li>
                                                        <li><a href="{{ route('website.programAndActivity.edit', $program->id) }}" class="dropdown-item" type="button">Edit</a></li>
                                                        <li>
                                                            <form action="" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                            </form>
                                                        </li>
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
                        <small>Showing {{$programs->count()}} of {{ $programs->total() }} program(s).</small>
                        {!! $programs->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection