@extends('layouts.main')
@section('contents')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="arrow-up-circle"><i data-feather="package"></i></div>
                                Tambah Stock Opname
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('stock-opname.index') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke daftar Stock Opname
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
                        <div class="card-header">Detail Stock Opname</div>
                        <div class="card-body">
                            <form method="post" action="{{ route('stock-opname.store') }}">
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
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Sisa Stok</label>
                                        <input class="form-control {{ $errors->has('sisa_stok') ? 'is-invalid' : '' }}"
                                            id="sisa_stok" type="number" placeholder="Ketik sisa stok"
                                            value="{{ old('sisa_stok') }}" min="0" name="sisa_stok" readonly />
                                        @error('sisa_stok')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Stok Update</label>
                                        <input class="form-control {{ $errors->has('stok_update') ? 'is-invalid' : '' }}"
                                            id="inputLastName" type="number" placeholder="Ketik stok update"
                                            value="{{ old('stok_update') }}" min="0" name="stok_update" />
                                        @error('stok_update')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1">Keterangan</label>
                                    <textarea class="lh-base form-control" type="text" name="keterangan" placeholder="keterangan stok opname"
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Shorthand for $( document ).ready()
        $(function() {
            $('#mySelect').change(function() {

                var url = "{{ route('barang.fetch', ['barang' => ':id']) }}";
                url = url.replace(':id', $(this).val());
                $.get(url,
                    function(data) {
                        $('#sisa_stok').val(data.stok);
                    })
            });
        });
    </script>
@endpush
