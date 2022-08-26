@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3> Dashboard</h3>
            </div>

            <div class="col-auto ml-auto text-right mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin Sistem</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body ">
                                    <h5 class="card-title text-white mb-4">Total Penjualan</h5>
                                    <h1 class="mt-1 mb-3 text-white">{{ $dashboard_data['siswa_count'] ?? 0 }} </h1>
                                    <div class="mb-1 detail justify-content-end">
                                        <a href="{{ url('/') }}">Lihat Detail <i
                                                class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
