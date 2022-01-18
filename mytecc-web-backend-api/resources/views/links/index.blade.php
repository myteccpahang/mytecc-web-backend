@extends('layouts.app')
@section('title', 'Links')
@section('content')
<div class="container">

    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-danger">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Links</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Links</h4>
                        <div>
                            <a href="{{ route('links.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="w-100 table">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Link Name</th>
                                    <th class="text-center">Link URL</th>
                                    <th class="text-center">Index</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($links->count())
                                    @foreach ($links as $link)
                                        <tr>
                                            <td class="align-middle text-center">{{ $link->id }}</td>
                                            <td class="align-middle text-uppercase text-nowrap">{{ $link->link_name }}</td>
                                            <td class="align-middle text-center">
                                                <a href="{{ $link->link_url }}" target="_blank"><i class="bi bi-box-arrow-up-right"></i></a>
                                            </td>
                                            <td class="align-middle text-center">{{ $link->index }}</td>
                                            <td class="align-middle text-center">
                                                @if ($link->status == "Enabled")
                                                    <span class="badge rounded-pill bg-success">{{ $link->status }}</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">{{ $link->status }}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="{{ route('links.show', $link->id) }}" class="dropdown-item" type="button">View</a></li>
                                                        <li><a href="{{ route('links.edit', $link->id) }}" class="dropdown-item" type="button">Edit</a></li>
                                                        <li>
                                                            <form action="{{ route('links.delete', $link->id) }}" method="POST">
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
                                        <td class="align-middle text-center">There is no data</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    {{-- <div class="d-flex justify-content-end mt-2">
                        {{-- {!! $links->links() !!}
                        {!! $links->appends(\Request::except('page'))->render() !!}
                    </div>
                    <div class="d-flex justify-content-end">
                        <small>Showing {{$links->count()}} of {{ $links->total() }} link(s).</small>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection