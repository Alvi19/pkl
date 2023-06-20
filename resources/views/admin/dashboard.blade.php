@extends('layouts.app')

@section('content')
<div class="container-fluid mt--5">
    <div class="row">
        <div class="col card-wrapper">
            <div class="card">
                <div class="card-body">
                <h1 class="text-dark text-center">Selamat Datang Di Halaman Admin</h1>
                <h1 class="text-dark text-center">Prodev Media</h1>
            </div><br>
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats-top bg-primary mb-3">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-white text-muted mb-3">Produk</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $jumlah_produk }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats-top bg-primary mb-3">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-white text-muted mb-3">Jenis Produk</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $jumlah_jenis_produk }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats-top bg-primary mb-3">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-white text-muted mb-3">Paket</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $jumlah_paket }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats-top bg-primary mb-3">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-white text-muted mb-3">Foto</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $jumlah_foto }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats-top bg-primary mb-3">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-white text-muted mb-3">Video</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $jumlah_vidio }}</span>
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
