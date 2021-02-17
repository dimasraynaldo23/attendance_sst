@extends('layouts/main')

@section('title', 'Dashboard User')

@section('container')

{{-- header --}}
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ url('/user') }}">Dashboard User</a></li>
              </ol>
            </nav>
          </div>
        </div>
        </div>       
           <div class="row justify-content-center mb-3">
              <h1 class="text-white">Attendance Screen</h1>
          </div>
    </div>
</div>
  

  <!-- Main content -->
  <div class="main-content">
    <!-- Page content -->
    <div class="container mt--5 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card card-profile bg-secondary mt-5">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <img src="../../img/theme/iwantyou.jpg" class="rounded-circle border-secondary">
                </div>
              </div>
            </div>
            <div class="card-body pt-7 px-5">
              <div class="text-center mb-2">
                <h3>{{ Auth::user()->name }}</h3>
              </div>
              <div class="text-center mb-2">
                <i class="fas fa-map-marker-alt text-green"> location</i>
              </div>  
              <div class="text-center">
                  <button type="button" class="btn btn-primary mt-2">Attend</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection