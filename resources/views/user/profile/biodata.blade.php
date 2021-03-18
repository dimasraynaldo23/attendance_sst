@extends('layouts/main')

@section('title', 'Profile')

@section('container')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        @if (session('status'))
                            <div class="alert alert-success text-center">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Biodata</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('/edit_profile') }}" class="btn btn-sm btn-primary">Edit profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-name">Name</label>
                                            <input type="text" id="input-name" class="form-control" readonly="readonly"
                                                value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-nik">NIK</label>
                                            <input type="text" id="input-nik" class="form-control" readonly="readonly"
                                                value="{{ Auth::user()->nik }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email Address</label>
                                            <input type="text" id="input-email" class="form-control" readonly="readonly"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-position">Position</label>
                                            <input type="text" id="input-position" class="form-control" readonly="readonly"
                                                value="{{ Auth::user()->position }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-position">Address</label>
                                            <input type="text" id="input-position" class="form-control" readonly="readonly"
                                                value="{{ Auth::user()->address }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="header pb-3 d-flex align-items-center"
                                            style="min-height: 375px; background-image: url(../../uploads/profile/{{ Auth::user()->avatar }}); background-size: cover; background-position: center top;">
                                        </div>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
