@extends('layouts/main')

@section('title', 'Dashboard User')

@section('container')

    {{-- header --}}
    <div class="header bg-primary mb-5 pb-2">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Attendance</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Main content -->
    <div class="main-content">
        <!-- Page content -->
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-7">
                    <div class="card card-profile bg-secondary mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <img src="{{ asset('uploads/profile/' . Auth::user()->avatar) }}" class="rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-7 px-5">
                            <div class="text-center mb-1">
                                <h3>{{ Auth::user()->name }}</h3>
                            </div>
                            <div class="text-center mb-3">
                                <i class="fas fa-map-marker-alt text-green">location</i>
                            </div>
                            <div class="text-center mb-2">
                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" id="workingdays" name="workingdays" value="1" class="custom-control-input">
                                    <label class="custom-control-label" for="workingdays">Workingdays</label>
                                </div>
                                <div class="custom-control custom-control-inline">
                                    <input type="checkbox" id="mandays" name="mandays" value="1" class="custom-control-input">
                                    <label class="custom-control-label" for="mandays">Mandays :
                                        <select class="custom-control-form-control small" id="mandaysFormControlSelect"
                                            name="project">
                                            @foreach ($projects as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $key == $id_project ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
