@extends('layouts/main')

@section('title', 'Project')

@section('container')

    {{-- header --}}
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Project Table</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Project</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Components</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal"
                            data-target="#exampleModal">
                            Add Project
                        </button>
                        <!-- Modal Add Project-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="/project" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col text-left">
                                                    <div class="form-group">
                                                        <label for="code-project" class="form-control-label">Code</label>
                                                        <input type="text" id="code-project" class="form-control @if ($errors->has('code')) is-invalid @endif"
                                                        name="code" placeholder="Project code.."
                                                        value="{{ old('code') }}">
                                                        @if ($errors->has('code'))
                                                            <div class="invalid-feedback">{{ $errors->first('code') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name-project" class="form-control-label">Name</label>
                                                        <input type="text" id="name-project" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                                        name="name" placeholder="Project name.."
                                                        value="{{ old('name') }}">
                                                        @if ($errors->has('name'))
                                                            <div class="invalid-feedback">{{ $errors->first('name') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- button Filters --}}
                        <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal"
                            data-target="#filtersModal">
                            Filters
                        </button>
                        <!-- Modal Filters -->
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
                                                        <label for="name=project" class="form-control-label">Project
                                                            Name</label>
                                                        <input type="text" id="name-project" class="form-control"
                                                            name="name" placeholder="Project name..">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success col-4 ml-2 mt-4">
                            {{ session('status') }}
                        </div>
                    @endif
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
                                <h3 class="mb-0">Project Data</h3>
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
                                    <th>No.</th>
                                    <th>Code</th>
                                    <th>Project</th>
                                    <th>Status</th>
                                    <th style="width:10px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr class="text-center">
                                        <td>{{ $project->id_project }}</td>
                                        <td>{{ $project->code }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->status }}</td>
                                        <td class="table-actions">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editProjectModal">Edit</button>
                                            {{-- <a type="button" class="table-action" data-toggle="modal"
                                                data-target="#editProjectModal">
                                                <i class="fas fa-user-edit"></i>
                                            </a> --}}
                                            
                                            {{-- modal edit --}}
                                            <div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog"
                                                aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Project</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="/project/{{ $project->id_project }}"
                                                                enctype="multipart/form-data">
                                                                {{ method_field('patch') }}
                                                                {{ csrf_field() }}
                                                                <div class="row">
                                                                    <div class="col text-left">
                                                                        <div class="form-group">
                                                                            <label for="code"
                                                                                class="form-control-label">{{ __('Code') }}</label>
                                                                            <input type="text" id="input-code"
                                                                                class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                                                                                name="code" placeholder="Project code.."
                                                                                value="{{ old('name', $project->code) }}"
                                                                                autocomplete="code" autofocus>
                                                                            @if ($errors->has('code'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('code') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="name"
                                                                                class="form-control-label">{{ __('Name') }}</label>
                                                                            <input type="text" id="input-name"
                                                                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                                                name="name" placeholder="Project name.."
                                                                                value="{{ old('name', $project->name) }}"
                                                                                autocomplete="name" autofocus>
                                                                            @if ($errors->has('name'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="name"
                                                                                class="form-control-label">{{ __('Status') }}</label>
                                                                                <select class="form-control small" id="statusFormControlSelect"
                                                                                name="status">
                                                                                @foreach ($statusProjects as $key => $value)
                                                                                <option value="{{ $key }}"
                                                                                    {{ $key == $id_status_project ? 'selected' : '' }}>
                                                                                    {{ $value }}
                                                                                </option>
                                                                            @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Edit</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <form action="/project/{{ $project->id_project }}" method="post"
                                                class="d-inline">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
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