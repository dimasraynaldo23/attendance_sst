@extends('layouts/main')
@section('title', 'Approve')

@section('container')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Approval</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Employee</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Approval</li>
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
                            <h3 class="mb-0">Approval</h3>
                        </div>
                        <div class="col-6 text-right">
                        </div>
                    </div>
                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>Year</th>
                                <th>Month</th>
                                <th>Day</th>
                                <th style="width:10px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                          <tr class="text-center">
                            <td>{{ date('Y',strtotime($attendance->date)) }}</td>
                            <td>{{ date('F',strtotime($attendance->date)) }}</td>
                            <td>{{ date('d',strtotime($attendance->date)) }}</td>
                            <td class="table-actions">
                              <a type="button" href="/attendance_list/{{ $attendance->date}}" class="btn btn-sm btn-success"> 
                                Approval
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