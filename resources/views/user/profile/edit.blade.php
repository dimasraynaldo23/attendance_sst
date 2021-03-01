@extends('layouts/main')

@section('title', 'Edit Profile')

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
                                <h3 class="mb-0">Edit profile </h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('biodata') }}" class="btn btn-sm btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('edit_profile_update') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="name">{{ __('Name') }}</label>
                                            <input type="text" id="input-name"
                                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" placeholder="Name" value="{{ old('name', $user->name) }}"
                                                autocomplete="name" autofocus>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label"
                                                for="email">{{ __('Email Address') }}</label>
                                            <input type="text" id="input-email"
                                                class="form-control  {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" placeholder="Email address"
                                                value="{{ old('email', $user->email) }}" autocomplete="email" autofocus>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="position">{{ __('Position') }}</label>
                                            <input type="text" id="input-position"
                                                class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}"
                                                name="position" placeholder="Position"
                                                value="{{ old('position', $user->position) }}" autocomplete="position"
                                                autofocus>
                                            @if ($errors->has('position'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('position') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="address">{{ __('Address') }}</label>
                                            <input type="text" id="input-position"
                                                class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                name="address" placeholder="Address"
                                                value="{{ old('address', $user->address) }}" autocomplete="address"
                                                autofocus>
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <img class="rounded-circle"
                                        src="{{ asset('uploads/profile/' . Auth::user()->avatar) }}" />
                                </div>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="avatar" id="AvatarFile"
                                            aria-describedby="fileHelp" <small id="fileHelp"
                                            class="form-text- text-muted">Please a valid image file. Size of image should
                                        not be motre than 2MB</small>
                                    </div>
                        </form>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-sm btn-primary">Save profile</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
