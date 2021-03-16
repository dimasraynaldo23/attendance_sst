@extends('layouts/main')

@section('title', 'Edit Employee')

@section('container')
    {{-- header --}}
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                </div>
            </div>
        </div>
    </div>

    {{-- body --}}
    <div class="container-fluid mt--7">
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
                                <h3 class="mb-0">Edit Employee</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/employee" class="btn btn-sm btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/employee/{{ $employee->id }}" enctype="multipart/form-data">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">{{ __('Name') }}</label>
                                            <input type="text" id="input-name"
                                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                name="name" placeholder="Employee Name.."
                                                value="{{ old('name', $employee->name) }}" autocomplete="name" autofocus>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nik" class="form-control-label">{{ __('NIK') }}</label>
                                            <input type="text" id="input-nik"
                                                class="form-control  {{ $errors->has('nik') ? 'is-invalid' : '' }}"
                                                name="nik" placeholder="NIK.." value="{{ old('nik', $employee->nik) }}"
                                                autocomplete="nik" autofocus>
                                            @if ($errors->has('nik'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nik') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col sm-6">
                                        <div class="form-group">
                                            <label for="email" class="form-control-label">{{ __('Email') }}</label>
                                            <input type="text" id="input-email"
                                                class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                name="email" placeholder="Email Address.."
                                                value="{{ old('email', $employee->email) }}" autocomplete="email"
                                                autofocus>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group  text-left ">
                                            <label class="form-control-label text-align-left"
                                                for="exampleFormControlTextarea1">Position</label>
                                            <select class="form-control small" id="exampleFormControlSelect1"
                                                name="position">
                                                @foreach ($positions as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ $key == $id_position ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-1">
                                    <img class="avatar rounded-circle"
                                        src="{{ asset('uploads/employee/' . $employee->avatar) }}" />
                                </div>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="avatar" id="AvatarFile"
                                            aria-describedby="fileHelp" value="{{ old('avatar') }}" <small id="fileHelp"
                                            class="form-text- text-muted">Please a valid image file. Size of image should
                                        not be motre than 2MB</small>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="submit" class="btn btn-large btn-success">Edit
                                        Employee</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
