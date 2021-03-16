@extends('layouts/main')
@section('title', 'Approve')

@section('container')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Approve</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Employee</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Approve</li>
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
                            <h3 class="mb-0">Approve</h3>
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
                                <th>Position</th>
                                <th class="text-center">W</th>
                                <th class="text-center">M</th>
                                <th>Project name</th>
                                <th class="text-center">Time</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    <td>Dimas</td>
                                    <td>123456789</td>
                                    <td>Developer</td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">1</td>
                                    <td>PI</td>
                                    <td class="text-center">09:00 AM</td>
                                    <td class="table-actions">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#approveModal"> 
                                            Approve
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal"> 
                                            Reject
                                        </button>
                                        {{-- modal Approve --}}
                                        <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Note</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="note" rows="3"></textarea>
                                                      </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-success">Approve</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          {{-- modal Reject --}}
                                          <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Note</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="note" rows="3"></textarea>
                                                      </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-success">Reject</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
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