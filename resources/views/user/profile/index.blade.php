@extends('layouts/main')

@section('title', 'Profile')

@section('container')

<div class="header pb-3 d-flex align-items-center" style="min-height: 535px; background-image: url(../../img/theme/iwantyou.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-7 col-md-10">
          <h1 class="display-2 text-white">Hello, {{ Auth::user()->name }}.</h1>
          <p class="text-white mt-0 mb-4">President Director</p>
          <a href="{{ url('/biodata') }}" class="btn btn-neutral">Biodata</a>
        </div>
      </div>
    </div>
  </div>
@endsection