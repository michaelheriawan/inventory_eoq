@extends('layouts.main')
@section('contents')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="arrow-up-circle"><i data-feather="activity"></i></div>
                                Tambah EOQ Barang
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('eoq-barang.index') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke daftar EOQ Barang
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
                        <div class="card-header">Detail EOQ Barang</div>
                        <div class="card-body">
                            <form method="post" action="{{ route('eoq-barang.store') }}">
                                @csrf
                                <!-- Form Row-->
                                <div class="mb-3">
                                    <label class="small mb-1">Nama Barang</label>
                                    <select class="form-select {{ $errors->has('barang_id') ? 'is-invalid' : '' }}"
                                        aria-label="Default select example" name="barang_id" id="mySelect">
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
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Bulan</label>
                                        <input class="form-control {{ $errors->has('bulan') ? 'is-invalid' : '' }}"
                                            id="bulan" type="text" placeholder="Ketik bulan"
                                            value="{{ old('bulan') }}" min="0" name="bulan" />
                                        @error('bulan')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Permintaan</label>
                                        <input
                                            class="form-control {{ $errors->has('jumlah_permintaan') ? 'is-invalid' : '' }}"
                                            id="permintaan" type="number" placeholder="Ketik jumlah permintaan"
                                            value="{{ old('jumlah_permintaan') }}" min="0"
                                            name="jumlah_permintaan" />
                                        @error('jumlah_permintaan')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Harga Barang</label>
                                        <input class="form-control {{ $errors->has('harga_barang') ? 'is-invalid' : '' }}"
                                            id="harga_barang" type="number" placeholder="Ketik harga barang"
                                            value="{{ old('harga_barang') }}" min="0" name="harga_barang" />
                                        @error('harga_barang')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Persentase Biaya Pesan</label>
                                        <input class="form-control" id="persentase" type="number"
                                            placeholder="Ketik persentase" min="0" />
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Biaya Pesan</label>
                                        <input class="form-control {{ $errors->has('biaya_pesan') ? 'is-invalid' : '' }}"
                                            id="biaya_pesan" type="number" placeholder="Ketik biaya pesan"
                                            value="{{ old('biaya_pesan') }}" min="0" name="biaya_pesan" readonly />
                                        @error('biaya_pesan')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Biaya Simpan</label>
                                        <input class="form-control {{ $errors->has('biaya_simpan') ? 'is-invalid' : '' }}"
                                            id="biaya_simpan" type="number" placeholder="Ketik biaya simpan"
                                            value="{{ old('biaya_simpan') }}" min="0" name="biaya_simpan" />
                                        @error('biaya_simpan')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputLastName">EOQ</label>
                                    <input class="form-control {{ $errors->has('eoq') ? 'is-invalid' : '' }}"
                                        id="eoq" type="number" value="{{ old('eoq') }}" min="0"
                                        name="eoq" readonly />
                                    @error('eoq')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">Tambah EOQ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Shorthand for $( document ).ready()
        $(function() {
            const hitung_ulang = function() {
                let biaya_simpan = $("#biaya_simpan").val();
                let permintaan = $("#permintaan").val();
                let biaya_pesan = $("#biaya_pesan").val();
                if (biaya_pesan != "" && permintaan != "" && biaya_simpan != "") {
                    $("#eoq").val(hitung_eoq(permintaan, biaya_pesan, biaya_simpan));
                }

            }
            const hitung_eoq = function(permintaan, biaya_pesan, biaya_simpan) {
                return Math.round(Math.sqrt((2 * biaya_pesan * permintaan) / biaya_simpan));
            }
            $("#persentase").on("input", function() {
                let persentase = $(this).val();
                let biaya_pesan = ($("#harga_barang").val() * persentase) / 100;
                $("#biaya_pesan").val(biaya_pesan);
                hitung_ulang();
            });

            $("#permintaan").on("input", function() {
                hitung_ulang();
            });
            $("#harga_barang").on("input", function() {
                hitung_ulang();
            });
            $("#biaya_simpan").on("input", function() {
                hitung_ulang();
            });
        });
    </script>
@endpush
