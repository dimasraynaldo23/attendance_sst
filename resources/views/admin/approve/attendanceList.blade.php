<?php
use App\Http\Controllers\ApproveController;
?>
@extends('layouts/main')
@section('title', 'Approve')

@section('container')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Attendance List Approval</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Attendance List Approval</li>
                            </ol>
                        </nav>
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
                                <h3 class="mb-0">Attendance List</h3>
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
                                    <th>NIK</th>
                                    <th>Present</th>
                                    <th>Absent</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th style="width:10px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        @if($attendance->status_approval == 'waiting')
                                        <td>{{ $attendance->nik }}</td>
                                        <td>{{ $attendance->present }}</td>
                                        <td>{{ $attendance->absent }}</td>
                                        <td>{{ $attendance->created_at }}</td>
                                        <td>{{ $attendance->status_approval }}</td>
                                        <td class="table-actions">
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                                data-target="#approvalModal{{$attendance->nik}}">
                                                Approve
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#rejectModal{{$attendance->nik}}">
                                                Reject
                                            </button>
                                            
                                {{-- modal present --}}
                            <div class="modal fade" id="approvalModal{{$attendance->nik}}" tabindex="-1" role="dialog"
                                aria-labelledby="approvalModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="approvalModalLabel">Approval</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/attendance_list/{{$attendance->id}}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                {{ method_field('patch') }}
                                                <div class="row">
                                                    <div class="col text-left">
                                                        <label class="form-control-label"
                                                        for="employeeNIK">NIK : {{ $attendance->nik }}</label>
                                                        @if($attendance->present == 1)
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
                                                                    @foreach (ApproveController::mandays($attendance->nik,$attendance->created_at) as $manday)
                                                                        <tr class="text-center">
                                                                            <td>
                                                                                <input type="hidden" name="project_code[]" value="{{ $manday->project_code }}">
                                                                                {{ $manday->project_code }}
                                                                            </td>
                                                                            <td
                                                                                    name="start_time[]">{{ $manday->start_time }}
                                                                            </td>
                                                                            <td
                                                                                    name="end_time[]">{{ $manday->end_time }}
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div class="form-group mt-2">
                                                                    <label class="form-control-label"
                                                                    for="employeeNote">Note</label>
                                                                    <textarea class="form-control" readonly="readonly" name="notePresent" id="note"
                                                                    rows="2">{{$attendance->note}}</textarea>
                                                                </div>
                                                            </div>
                                                            @else
                                                            <div class="table-responsive">
                                                                <div class="form-group mt-2">
                                                                    <label class="form-control-label"
                                                                    for="employeeNote">Note</label>
                                                                    <textarea class="form-control" readonly="readonly" name="notePresent" id="note"
                                                                    rows="2">{{$attendance->note}}</textarea>
                                                                </div>
                                                            </div>  
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Approve</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- modal Reject --}}
                            <div class="modal fade" id="rejectModal{{$attendance->nik}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {{-- @foreach (ApproveController::reject($attendance->nik,$attendance->note) as $manday) --}}
                                        <div class="modal-body">
                                            <label class="form-control-label"
                                                        for="employeeNIK">NIK : {{ $attendance->nik }}</label><br>
                                            <label class="form-control-label"
                                                        for="employeeName">Note :</label>
                                            <form method="post" action="/attendance_list/{{ $attendance->id }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <textarea class="form-control" name="note_reject" id="note" rows="3"></textarea>
                                                </div>
                                            </div>
                                            {{-- @endforeach --}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Reject</button>
                                            </div>
                                        </form>
                                        </div>
                                </div>
                            </div>
                            </td>
                            @endif
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