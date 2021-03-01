@extends('layouts/main')

@section('title', 'Dashboard')

@section('container')

{{-- header --}}
<div class="header bg-primary pb-2">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>

<!-- Card stats -->
<div class="container-fluid mt-4">
<div class="row">
  <div class="col-xl-3 col-md-6">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body ml-2">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-2">Total Employee</h5>
            <span class="h2 font-weight-bold">350,897</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
              <i class="ni ni-single-02"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xl-3 col-md-6">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body ml-2">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-2">On Time Percentase</h5>
            <span class="h2 font-weight-bold">350,897</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
              <i class="ni ni-chart-bar-32"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body ml-2">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-4">On Time Today</h5>
            <span class="h2 font-weight-bold">350,897</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
              <i class="fas fa-clock"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xl-3 col-md-6">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body ml-2">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-4">Late Today</h5>
            <span class="h2 font-weight-bold">350,897</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
              <i class="fas fa-exclamation"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection