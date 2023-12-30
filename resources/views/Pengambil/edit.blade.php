@extends('layouts.main')
@section('contents')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="package"></i></div>
                                Edit Pengambil
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('pengambil.index') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke daftar pengambil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Detail pengambil</div>
                        <div class="card-body">
                            <form method="post"
                                action="{{ route('pengambil.update', ['pengambil' => $detail_pengambil->id_pengambil]) }}">
                                @method('PUT')
                                @csrf

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Nama Supplier</label>
                                        <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                            id="inputFirstName" type="text" placeholder="Ketik Nama Barang"
                                            value="{{ old('nama', $detail_pengambil->nama) }}" name="nama" />
                                        @error('nama')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Email</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            id="inputLastName" type="email" placeholder="Ketik email Barang"
                                            value="{{ old('email', $detail_pengambil->email) }}" min="0"
                                            name="email" />
                                        @error('email')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">No. Telpon</label>
                                    <input class="form-control {{ $errors->has('No_Tlp') ? 'is-invalid' : '' }}"
                                        id="inputEmailAddress" type="text" placeholder="Masukkan No_Tlp"
                                        value="{{ old('No_Tlp', $detail_pengambil->No_Tlp) }}" name="No_Tlp" />
                                    @error('No_Tlp')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Alamat</label>
                                    <input class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                                        id="inputEmailAddress" type="text" placeholder="Masukkan alamat"
                                        value="{{ old('alamat', $detail_pengambil->alamat) }}" name="alamat" />
                                    @error('alamat')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Nama Usaha</label>
                                    <input class="form-control {{ $errors->has('nama_usaha') ? 'is-invalid' : '' }}"
                                        id="inputEmailAddress" type="text" placeholder="Masukkan nama usaha"
                                        value="{{ old('nama_usaha', $detail_pengambil->nama_usaha) }}" name="nama_usaha" />
                                    @error('nama_usaha')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">Edit pengambil</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
