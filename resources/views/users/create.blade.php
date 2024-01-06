@extends('layouts.main')
@section('contents')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="users"></i></div>
                                Tambah User
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('users.index') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke daftar user
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
                        <div class="card-header">Detail User</div>
                        <div class="card-body">
                            <form method="post" action="{{ route('users.store') }}">
                                @csrf
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Nama User</label>
                                        <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                            id="inputFirstName" type="text" placeholder="Ketik Nama Barang"
                                            value="{{ old('nama') }}" name="nama" />
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
                                            value="{{ old('email') }}" min="0" name="email" />
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
                                        id="inputEmailAddress" type="text" placeholder="Masukkan No. Telpon"
                                        value="{{ old('No_Tlp') }}" name="No_Tlp" />
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
                                        value="{{ old('alamat') }}" name="alamat" />
                                    @error('alamat')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Password</label>
                                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        id="inputEmailAddress" type="password" placeholder="Masukkan password"
                                        value="{{ old('password') }}" name="password" />
                                    @error('password')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1">Level</label>
                                    <select class="form-select {{ $errors->has('level') ? 'is-invalid' : '' }}"
                                        aria-label="Default select example" name="level">
                                        <option selected disabled value="">Pilih level:</option>
                                        <option value="admin">Admin</option>
                                        <option value="pemilik">Pemilik</option>
                                    </select>
                                    @error('level')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Gambar</label>

                                    <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                        id="file-input" type="file" placeholder="Masukkan gambar"
                                        value="{{ old('image') }}" name="image" />

                                    @error('image')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div id='img_contain' class="mb-3">
                                    <img id="image-preview"
                                        src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png"
                                        alt="your image" title='' />
                                </div>
                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">Tambah User</button>
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                    $('#image-preview').hide();
                    $('#image-preview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }


        $(function() {
            $("#file-input").change(function() {
                $('#image-preview').hide();
                readURL(this);
            });
        });
    </script>
@endpush
