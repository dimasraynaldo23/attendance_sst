@extends('layouts/main')

@section('title', 'Client')

@section('container')

{{-- header --}}
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Attendance Table</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Attendance</a></li>
              <li class="breadcrumb-item active" aria-current="page">Cataloger</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="#" class="btn btn-sm btn-neutral">New</a>
          <a href="#" class="btn btn-sm btn-neutral">Filters</a>
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
          <h3 class="mb-0">Attendance Cataloger</h3>
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
            <th>Name</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="table-user">
              <img src="../../img/brand/sst.png" class="avatar rounded-circle mr-3">
              <b>{{ Auth::user()->name }}</b>
            </td>
            <td class="table-user">
              <img src="../../img/brand/sst.png" class="avatar rounded-circle mr-3">
              <b>{{ Auth::user()->name }}</b>
            </td>
            <td class="table-user">
              <img src="../../img/brand/sst.png" class="avatar rounded-circle mr-3">
              <b>{{ Auth::user()->name }}</b>
            </td>
            <td class="table-user">
              <img src="../../img/brand/sst.png" class="avatar rounded-circle mr-3">
              <b>{{ Auth::user()->name }}</b>
            </td>
            <td class="table-user">
              <img src="../../img/brand/sst.png" class="avatar rounded-circle mr-3">
              <b>{{ Auth::user()->name }}</b>
            </td>
            <td class="table-user">
              <img src="../../img/brand/sst.png" class="avatar rounded-circle mr-3">
              <b>{{ Auth::user()->name }}</b>
            </td>
            <td class="table-user">
              <img src="../../img/brand/sst.png" class="avatar rounded-circle mr-3">
              <b>{{ Auth::user()->name }}</b>
            </td>
            <td class="table-user">
              <img src="../../img/brand/sst.png" class="avatar rounded-circle mr-3">
              <b>{{ Auth::user()->name }}</b>
            </td>
            <td class="table-actions">
              <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit product">
                <i class="fas fa-user-edit"></i>
              </a>
              <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
    </div>
  </div>
</div>
  @endsection