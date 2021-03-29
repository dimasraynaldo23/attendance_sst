@extends('layouts/main')

@section('title', 'Attendance List Table')

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
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Attendance</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal"
                            data-target="#filtersModal">
                            Filters
                        </button>
                        <div class="modal fade" id="filtersModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Filters</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col text-left">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="employeeName">Employee
                                                            name</label>
                                                        <select class="form-control small" id="exampleFormControlSelect1"
                                                            name="employee">
                                                            @foreach ($users as $key => $value)
                                                                <option value="{{ $key }}"
                                                                    {{ $key == $id ? 'selected' : '' }}>
                                                                    {{ $value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="fromDate">From
                                                                    date</label>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i
                                                                                    class="ni ni-calendar-grid-58"></i></span>
                                                                        </div>
                                                                        <input class="form-control datepicker"
                                                                            placeholder="Select date" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="toDate">To
                                                                    date</label>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i
                                                                                    class="ni ni-calendar-grid-58"></i></span>
                                                                        </div>
                                                                        <input class="form-control datepicker"
                                                                            placeholder="Select date" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Filters</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                            <div class="col-4 mb-2">
                                <h3>Attendance</h3> <br>
                            </div>
                        </div>
                    </div>

                    <!-- Light table -->
                    <div class="table-responsive mt--5">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>NIK Employee</th>
                                    <th>Present</th>
                                    <th>Absent</th>
                                    <th>Project_code</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $attendance)
                                    <tr class="text-center">
                                        <td>{{ $attendance->id }}</td>
                                        <td>{{ $attendance->created_at }}</td>
                                        <td>{{ $attendance->nik }}</td>
                                        <td class="text-center">{{ $attendance->present }}</td>
                                        <td>{{ $attendance->absent }}</td>
                                        <td>{{ $attendance->project_code }}</td>
                                        <td>{{ $attendance->approval_note }}</td>
                                        <td @if ($attendance->status_approval == 'approve') 
                                                    class="badge badge-pill badge-success"
                                        @elseif($attendance->status_approval == 'reject')
                                                    class="badge badge-pill badge-danger" 
                                        @else
                                                    class="badge badge-pill badge-primary" 
                                        @endif>{{ $attendance->status_approval }}</td>
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
