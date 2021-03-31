@extends('layouts/main')

@section('title', 'Employee')

@section('container')

    {{-- header --}}
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Employee Table</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Components</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ url('create_employee') }}" class="btn btn-sm btn-neutral">Add Employee</a>
                    </div>
                </div>
                {{-- @if (session('status'))
                    <div class="alert alert-success col-4">
                        {{ session('status') }}
                    </div>
                @endif --}}
            </div>
        </div>
    </div>

    {{-- page content --}}
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="mb-0">Employee Data</h3>
                            </div>
                            <div class="col-6 text-right">
                            </div>
                        </div>
                    </div>

                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Employee Name</th>
                                    <th>NIK</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="table-user">
                                            <img src="{{ asset('uploads/profile/' . $user->avatar) }}"
                                                class="avatar rounded-circle mr-3">
                                            <b>{{ $user->name }}</b>
                                        </td>
                                        <td>{{ $user->nik }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->position }}</td>
                                        <td class="table-actions">
                                            {{-- <a href="/employee/{{ $user->id }}/edit" class="btn btn-primary">Edit</a> --}}
                                            <form action="/employee/{{ $user->id }}" method="post" class="d-inline">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
