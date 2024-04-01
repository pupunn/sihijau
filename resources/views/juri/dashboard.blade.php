@extends('layouts.juri')

@section('content')
<!-- Widgets  -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    {{-- <div class="stat-icon dib flat-color-1">
                        <i class="pe-7s-cash"></i>
                    </div> --}}
                    {{-- <div class="stat-content"> --}}
                    <div class="text-left dib">
                        <div class="stat-text">Selamat Datang,</div>
                        <div class="stat-heading">{{ $user->name }}</div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    {{-- <div class="stat-icon dib flat-color-2">
                        <i class="pe-7s-culture"></i>
                    </div> --}}
                    {{-- <div class="stat-content"> --}}
                    <div class="text-left dib">
                        <div class="stat-text">Download Panduan</div>
                        <div class="stat-heading"><a href="{{ asset("storage/PANDUAN UNNES GSR 2021 - Juri.pdf") }}"
                                class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download </a></div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-4">
                        <i class="pe-7s-like"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">{{ $aspek }}</span></div>
                            <div class="stat-heading">Aspek</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-3">
                        <i class="pe-7s-browser"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">{{ $indikator }}</span></div>
                            <div class="stat-heading">Indikator</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
