@extends('layouts/main')

@section('title', 'Dashboard User')

@section('container')

    {{-- header --}}
    <div class="header bg-primary mb-5 pb-2">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-2">
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

    @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif

    <!-- Main content -->
    <div class="main-content">
        <!-- Page content -->
        <div class="container pb-7">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-7">
                    <div class="card card-profile bg-secondary mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <img src="{{ asset('uploads/profile/' . Auth::user()->avatar) }}"
                                        class="rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-7 px-5">
                            <div class="text-center mb-5">
                                <h3>{{ Auth::user()->name }}</h3>
                            </div>
                            {{-- <div class="text-center mb-3">
                                <i class="fas fa-map-marker-alt text-yellow">location</i>
                            </div> --}}
                            <div class="text-center mb-2">
                                <div class="custom-control custom-control-inline">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#presentModal">
                                        Present
                                    </button>
                                </div>
                                <div class="custom-control custom-control-inline">
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#absentModal">
                                        Absent
                                    </button>
                                </div>
                            </div>

                            {{-- modal present --}}
                            <div class="modal fade" id="presentModal" tabindex="-1" role="dialog"
                                aria-labelledby="presentModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="presentModalLabel">Present</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/attendance_present" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col text-left">
                                                        <label class="form-control-label"
                                                            for="employeeName">{{ Auth::user()->name }}</label>
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr class="text-center">
                                                                        <th>Project Name</th>
                                                                        <th>Start</th>
                                                                        <th>End</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($projects as $project)
                                                                        <tr class="text-center">
                                                                            <td>
                                                                                <input type="hidden" name="project_code[]" value="{{ $project->code }}">
                                                                                {{ $project->name }}
                                                                            </td>
                                                                            <td><input type="time" id="start_time" name="start_time[]">
                                                                            </td>
                                                                            <td><input type="time" id="end_time" name="end_time[]">
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                                <div class="form-group mt-2">
                                                                    <label class="form-control-label"
                                                                        for="employeeNote">Note</label>
                                                                    <textarea class="form-control" name="notePresent"
                                                                        id="note" rows="2"></textarea>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- modal Absent --}}
                            <div class="modal fade" id="absentModal" tabindex="-1" role="dialog"
                                aria-labelledby="absentModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="absentModalLabel">Absent</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="/attendance_absent" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label class="form-control-label" for="employeeName">Note</label>
                                                    <textarea class="form-control @if ($errors->has('noteAbsent')) is-invalid @endif" name="noteAbsent" id="note" rows="3"></textarea>
                                                    @if ($errors->has('noteAbsent'))
                                                        <div class="invalid-feedback">{{ $errors->first('noteAbsent') }}
                                                        </div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
