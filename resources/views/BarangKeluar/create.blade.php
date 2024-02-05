@extends('layouts.main')
@section('contents')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="arrow-up-circle"><i data-feather="arrow-down-circle"></i></div>
                                Tambah Barang Keluar
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('barang-keluar.index') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke daftar barang keluar
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
                        <div class="card-header">Detail Barang Keluar</div>
                        <div class="card-body">
                            <form method="post" action="{{ route('barang-keluar.store') }}">
                                @csrf
                                <!-- Form Row-->
                                <div class="mb-3">
                                    <label class="small mb-1">Nama Barang</label>
                                    <select class="form-select {{ $errors->has('barang_id') ? 'is-invalid' : '' }}"
                                        aria-label="Default select example" name="barang_id">
                                        <option selected disabled value="">Pilih Barang:</option>
                                        @foreach ($barangs as $item)
                                            <option value="{{ $item->id_barang }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('barang_id')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1">Nama Petugas</label>
                                    <select class="form-select {{ $errors->has('user_id') ? 'is-invalid' : '' }}"
                                        aria-label="Default select example" name="user_id">
                                        <option selected disabled value="">Pilih Petugas:</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id_user }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputLastName">Jumlah Barang</label>
                                    <input class="form-control {{ $errors->has('jumlah_keluar') ? 'is-invalid' : '' }}"
                                        id="inputLastName" type="number" placeholder="Ketik jumlah Barang"
                                        value="{{ old('jumlah_keluar') }}" min="0" name="jumlah_keluar" />
                                    @error('jumlah_keluar')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1">Keterangan</label>
                                    <textarea class="lh-base form-control" type="text" name="keterangan" placeholder="keterangan Barang Masuk"
                                        rows="4"></textarea>
                                    @error('keterangan')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
