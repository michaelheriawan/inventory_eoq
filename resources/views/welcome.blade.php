@extends('layouts.main')
@section('contents')
    <main>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-5">
            <!-- Custom page header alternative example-->
            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                <div class="me-4 mb-3 mb-sm-0">
                    <h1 class="mb-0">Dashboard</h1>
                    <div class="small">
                        <span class="fw-500 text-primary"></span>
                        &middot; September 20, 2021 &middot; 12:16 PM
                    </div>
                </div>

            </div>
            <!-- Illustration dashboard card example-->
            <div class="card card-waves mb-4 mt-5">
                <div class="card-body p-5">
                    <div class="row align-items-center justify-content-between">
                        <div class="col">
                            <h2 class="text-primary">Selamat datang di Sistem Informasi Inventory</h2>
                            <p class="text-gray-700">Sistem ini memiliki fitur kelola barang, barang masuk, barang
                                keluar, supplier dan lain-lain </p>
                            <a class="btn btn-primary p-3" href="{{ route('barang.index') }}">
                                Kelola Barang
                                <i class="ms-1" data-feather="arrow-right"></i>
                            </a>
                        </div>
                        <div class="col d-none d-lg-block mt-xxl-n4"><img class="img-fluid px-xl-4 mt-xxl-n5"
                                src="{{ asset('ui/assets/img/illustrations/statistics.svg') }}" /></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <!-- Dashboard info widget 1-->
                    <div class="card border-start-lg border-start-primary h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="small fw-bold text-primary mb-1">Jumlah Barang</div>
                                    <div class="text-lg fw-bold">{{ $Barang }}</div>
                                </div>
                                <i class="feather-xl text-primary" data-feather="package"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="stretched-link" href={{ route('barang.index') }}>Tampil barang</a>
                            <div><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <!-- Dashboard info widget 2-->
                    <div class="card border-start-lg border-start-secondary h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="small fw-bold text-secondary mb-1">Barang Masuk</div>
                                    <div class="text-lg fw-bold">{{ $BarangMasuk }}</div>
                                </div>
                                <i class="feather-xl text-secondary" data-feather="clipboard"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="stretched-link" href={{ route('barang-masuk.index') }}>Tampil barang masuk</a>
                            <div><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <!-- Dashboard info widget 3-->
                    <div class="card border-start-lg border-start-success h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="small fw-bold text-success mb-1">Barang Keluar</div>
                                    <div class="text-lg fw-bold">{{ $BarangKeluar }}</div>
                                </div>
                                <i class="feather-xl text-success" data-feather="activity"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="stretched-link" href={{ route('barang-keluar.index') }}>Tampil barang keluar</a>
                            <div><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <!-- Dashboard info widget 4-->
                    <div class="card border-start-lg border-start-info h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="small fw-bold text-info mb-1">User</div>
                                    <div class="text-lg fw-bold">{{ $User }}</div>
                                </div>
                                <i class="feather-xl text-info" data-feather="users"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="stretched-link" href={{ route('users.index') }}>Tampil user</a>
                            <div><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
