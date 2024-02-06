@extends('layouts.main')
@section('contents')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Profil
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href='/'>
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-2 mb-xl-0">
                        <div class="card-header">Profil</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2"
                                src="{{ $User->gambar != '' ? asset('storage/' . $User->gambar) : 'https://placehold.jp/150x150.png?text=No+image' }}"
                                alt='' />
                            <h2>{{ $User->nama }}</h2>
                            {{-- <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button-->
                            <button class="btn btn-primary" type="button">Upload new image</button> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Detail Akun</div>
                        <div class="card-body">
                            <table class="table table-striped-columns mt-1">
                                <tr>
                                    <td width="50%" class="fw-bold">Nama</td>
                                    <td id="d_nama">{{ $User->nama }}</td>
                                </tr>
                                <tr>
                                    <td width="50%" class="fw-bold">Email</td>
                                    <td id="d_email">{{ $User->email }}</td>
                                </tr>
                                <tr>
                                    <td width="50%" class="fw-bold">No.Tlp</td>
                                    <td id="d_no_tlp">{{ $User->no_tlp }}</td>
                                </tr>
                                <tr>
                                    <td width="50%" class="fw-bold">Alamat</td>
                                    <td id="d_alamat">{{ $User->alamat }}</td>
                                </tr>
                                <tr>
                                    <td width="50%" class="fw-bold">Level</td>
                                    <td id="d_level" class="text-capitalize">{{ $User->level }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
