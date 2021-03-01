@extends('layouts/main')

@section('title', 'Location')

@section('container')

    <style>
        #map {
            height: 500px;
            width: 600px;
            margin: 0 auto;
        }
    </style>

    {{-- header --}}
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Location</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Location</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- page content --}}
    <div class="container">
        <div id="map"></div>
    </div>

    {{-- javascript maps --}}
    <script crossorigin="anonymous" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="
        src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeYgEprfIds7t1SRxnQRztBaJFimK_ch8" async></script>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
