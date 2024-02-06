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
                                Edit User
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
                            <form method="post" enctype='multipart/form-data'
                                action="{{ route('users.update', ['user' => $detail_user->id_user]) }}">
                                @method('PUT')
                                @csrf
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Nama User</label>
                                        <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                            id="inputFirstName" type="text" placeholder="Ketik Nama"
                                            value="{{ old('nama', $detail_user->nama) }}" name="nama" />
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
                                            id="inputLastName" type="email" placeholder="Ketik email"
                                            value="{{ old('email', $detail_user->email) }}" min="0" name="email" />
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
                                    <input class="form-control {{ $errors->has('no_tlp') ? 'is-invalid' : '' }}"
                                        id="inputEmailAddress" type="text" placeholder="Masukkan No.Telpon"
                                        value="{{ old('no_tlp', $detail_user->no_tlp) }}" name="no_tlp" />
                                    @error('no_tlp')
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
                                        value="{{ old('alamat', $detail_user->alamat) }}" name="alamat" />
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
                                        value="{{ old('password', $detail_user->password) }}" name="password" />
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
                                        <option disabled value="">Pilih level:</option>
                                        <option {{ $detail_user->level == 'admin' ? 'selected' : '' }} value="admin">
                                            Admin</option>
                                        <option {{ $detail_user->level == 'pemilik' ? 'selected' : '' }} value="pemilik">
                                            Pemilik</option>
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
                                    <div class="img_container mb-3">
                                        <div id='img_contain'>
                                            <img id="image-preview" src="{{ asset('storage/' . $detail_user->gambar) }}"
                                                alt="your image" />
                                            <a href="#" class="close-thik"></a>
                                        </div>
                                    </div>
                                    <input class="form-control {{ $errors->has('gambar') ? 'is-invalid' : '' }}"
                                        id="file-input" type="file" placeholder="Masukkan gambar"
                                        value="{{ old('gambar', $detail_user->gambar) }}" name="gambar" />

                                    @error('gambar')
                                        <div id="validationServer03Feedback" class="invalid-feedback"
                                            style="text-transform: capitalize;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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
            let gambar = {!! json_encode($detail_user->gambar) !!};
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
