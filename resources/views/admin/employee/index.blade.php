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
              <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Employee</a></li>
              <li class="breadcrumb-item active" aria-current="page">Components</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="{{ url('add_employee') }}" class="btn btn-sm btn-neutral">Add Employee</a>
        </div>
      </div>
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
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($employees as $employee)
          <tr>
              <td class="table-user">
                <img src="{{ asset('uploads/employee/' . $employee->avatar) }}" class="avatar rounded-circle mr-3">
                <b>{{ $employee->name}}</b>
              </td>
              <td>{{$employee->nik}}</td>
              <td>{{$employee->email}}</td>
              <td>{{$employee->position}}</td>
              <td class="table-actions">
              <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit Employee">
                <i class="fas fa-user-edit"></i>
              </a>
              <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
                <i class="fas fa-trash"></i>
              </a>
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