@extends('layouts.main')
@section('contents')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="layers"></i></div>
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
                            <form method="post" enctype="multipart/form-data"
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
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Harga Beli</label>
                                        <input class="form-control {{ $errors->has('harga_beli') ? 'is-invalid' : '' }}"
                                            id="inputFirstName" type="text" placeholder="Ketik Harga Beli"
                                            value="{{ old('harga_beli', $detail_barang->harga_beli) }}" name="harga_beli" />
                                        @error('harga_beli')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Harga Jual</label>
                                        <input class="form-control {{ $errors->has('harga_jual') ? 'is-invalid' : '' }}"
                                            id="inputLastName" type="number" placeholder="Ketik Harga Jual"
                                            value="{{ old('harga_jual', $detail_barang->harga_jual) }}" min="0"
                                            name="harga_jual" />
                                        @error('harga_jual')
                                            <div id="validationServer03Feedback" class="invalid-feedback"
                                                style="text-transform: capitalize;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
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
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Gambar</label>
                                    <div class="img_container mb-3">
                                        <div id='img_contain'>
                                            <img id="image-preview" src="{{ asset('storage/' . $detail_barang->gambar) }}"
                                                alt="your image" />
                                            <a href="#" class="close-thik"></a>
                                        </div>
                                    </div>
                                    <input class="form-control{{ $errors->has('gambar') ? ' is-invalid' : '' }}"
                                        id="file-input" type="file" placeholder="Masukkan gambar"
                                        value="{{ old('gambar', Str::after($detail_barang->gambar, 'barang/')) }}"
                                        name="gambar" />

                                    @error('gambar')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="img_container mb-3">
                                    <div id='img_contain'>
                                        <img id="image-preview" src="{{ asset('storage/' . $detail_barang->gambar) }}"
                                            alt="your image" title='' />
                                        <a href="#" class="close-thik"></a>
                                    </div>
                                </div> --}}


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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                    $('#image-preview').hide();
                    $('.close-thik').show();
                    $('.img_container').show();
                    $('#image-preview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function hideImage() {
            $('.img_container').hide();
            $('.close-thik').hide();
        }

        $(function() {
            hideImage();
            let gambar = {!! json_encode($detail_barang->gambar) !!};
            if (gambar) {
                $('.close-thik').show();
                $('.img_container').show();
                $('#image-preview').fadeIn(650);
            }
            $("#file-input").change(function() {
                readURL(this);
            });

            $('.close-thik').on('click', function() {
                $('#file-input').val('');
                hideImage();
            });
        });
    </script>
@endpush
