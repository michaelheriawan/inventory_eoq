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
                                Edit Barang
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('barang.index') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke daftar barang
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
                        <div class="card-header">Detail Barang</div>
                        <div class="card-body">
                            <form method="post"
                                action="{{ route('barang.update', ['barang' => $detail_barang->id_barang]) }}">
                                @method('PUT')
                                @csrf
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Nama Barang</label>
                                        <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                            id="inputFirstName" type="text" placeholder="Ketik Nama Barang"
                                            value="{{ old('nama', $detail_barang->nama) }}" name="nama" />
                                        @error('nama')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Stok</label>
                                        <input class="form-control {{ $errors->has('stok') ? 'is-invalid' : '' }}"
                                            id="inputLastName" type="number" placeholder="Ketik Stok Barang"
                                            value="{{ old('stok', $detail_barang->stok) }}" min="0" name="stok" />
                                        @error('stok')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Gambar</label>
                                    <input class="form-control {{ $errors->has('gambar') ? 'is-invalid' : '' }}"
                                        id="inputEmailAddress" type="text" placeholder="Masukkan Gambar"
                                        value="{{ old('gambar', $detail_barang->gambar) }}" name="gambar" />
                                    @error('gambar')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1">Kategori</label>
                                    <select class="form-select {{ $errors->has('kategori') ? 'is-invalid' : '' }}"
                                        aria-label="Default select example" name="kategori">
                                        <option disabled>Pilih kategori:</option>
                                        @foreach ($kategoris as $kategori)
                                            <option
                                                {{ $kategori->id_kategori == $detail_barang->kategori ? 'selected' : '' }}
                                                value="{{ $kategori->id_kategori }}">{{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">Edit barang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
