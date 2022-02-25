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
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link link-dark" href="{{ route('website.aboutUs') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                         <a class="nav-link link-dark" href="{{ route('website.programAndActivity') }}">Program & Activity</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-dark active" href="{{ route('website.teamMembers.index') }}">Team Members</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('website.teamMembers.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Team Members</a>
                    </div>

                    <div class="table-responsive">
                        <table class="w-100 table">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th class="text-center">Session</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Instagram</th>
                                    <th class="text-center">Index</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($members->count())
                                    @foreach ($members as $member)
                                        <tr>
                                            <td class="align-middle text-center">{{ $member->id }}</td>
                                            <td class="align-middle">{{ $member->name }}</td>
                                            <td class="align-middle">{{ $member->role }}</td>
                                            <td class="align-middle text-center">{{ $member->session }}</td>
                                            <td class="align-middle text-center">{{ $member->phone }}</td>
                                            <td class="align-middle text-center"><a href="https://instagram.com/{{ $member->instagram }}" target="_bank"><i class="bi bi-box-arrow-up-right"></i></i></a></td>
                                            <td class="align-middle text-center">{{ $member->index }}</td>
                                            <td class="align-middle text-center">
                                                @if ($member->status == "Enabled")
                                                    <span class="badge rounded-pill bg-success">{{ $member->status }}</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">{{ $member->status }}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="{{ route('website.teamMembers.show', $member->id) }}" class="dropdown-item" type="button">View</a></li>
                                                        <li><a href="{{ route('website.teamMembers.edit', $member->id) }}" class="dropdown-item" type="button">Edit</a></li>
                                                        <li>
                                                            <form action="{{ route('website.teamMembers.delete', $member->id) }}" method="POST">
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
                                        <td colspan="9" class="align-middle text-center py-3">There is no data</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <small>Showing {{$members->count()}} of {{ $members->total() }} member(s).</small>
                        {!! $members->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection