@extends('layouts/main')

@section('title', 'Profile')

@section('container')
<div class="container-fluid mt-3">
    <div class="row">
      <div class="col">
        <div class="card">
            <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                <h3 class="mb-0">My profile </h3>
                </div>
                <div class="col-4 text-right">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-danger">Back</a>
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
                        <input type="text" id="input-name" class="form-control" placeholder="Name">
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label" for="input-email">Email Address</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Email address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="input-position">Position</label>
                        <input type="text" id="input-position" class="form-control" placeholder="Position">
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-position">Address</label>
                            <input type="text" id="input-position" class="form-control" placeholder="Address">
                        </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Profile Picture</label>
                        <br>
                        <input type="file" id="customeImage" class="custom-image-input">
                        <label class="custom-image-label" for="customImage"></label>
                    </div>
                    </div>
                </div>
                <div class="text-right">
                <a href="{{ url('/edit_profile') }}" class="btn btn-sm btn-primary">Edit profile</a>
                </div>
            </div>
            </form>
        </div>
        </div>
      </div>
    </div>
</div>
  @endsection