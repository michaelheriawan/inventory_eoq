@extends('layouts.main')
@section('contents')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon icon-white"><i data-feather="tag"></i></div>
                                Kategori
                            </h1>
                            <div class="page-header-subtitle">A simplified page header for use with the dashboard layout
                            </div>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <button class="btn btn-sm btn-light text-primary shadow" type="button" data-bs-toggle="modal"
                                data-bs-target="#createGroupModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus me-1">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Tambah Kategori Baru
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content-->
        <div class="container-xl px-4">
            <div class="card">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($kategoris as $kategori)
                                <tr>
                                    <td class="id">{{ $kategori->id_kategori }}</td>
                                    <td class="nama">{{ $kategori->nama }}</td>
                                    <td>
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" type="button"
                                            data-bs-toggle="modal" data-bs-target="#editGroupModal" id="myDiv"><i
                                                data-feather="edit"></i></button>
                                        {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark delete" href="#!"><i
                                                data-feather="trash-2"></i></a> --}}
                                        <form action="kategori/{{ $kategori->id_kategori }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark delete"
                                                type="submit"><i data-feather="trash-2"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- Create group modal-->
    <div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="createGroupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createGroupModalLabel">Tambah Kategori</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="kategori">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-0">
                            <label for="validationServer03" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama" value="{{ old('nama') }}"
                                class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" id="validationServer03"
                                aria-describedby="validationServer03Feedback">
                            @error('nama')
                                <div id="validationServer03Feedback" class="invalid-feedback"
                                    style="text-transform: capitalize;">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger-soft text-danger" type="button"
                            data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary-soft text-primary" type="submit">Tambah Kategori Baru</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit group modal-->
    <div class="modal fade" id="editGroupModal" tabindex="-1" role="dialog" aria-labelledby="editGroupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGroupModalLabel">Edit Kategori</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="kategori" class="editForm">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">

                        <div class="mb-0">
                            <label for="validationServer03" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama"
                                class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }} editInput"
                                id="validationServer03" aria-describedby="validationServer03Feedback">
                            @error('nama')
                                <div id="validationServer03Feedback" class="invalid-feedback"
                                    style="text-transform: capitalize;">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger-soft text-danger" type="button"
                            data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary-soft text-primary" type="submit">Edit Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', "#myDiv", function() {
            var trid = $(this).closest('tr').find('.nama').text();
            $(".editInput").val(trid);
            var action = $('.editForm').attr('action');

            $('.editForm').attr('action', action + "/" + id);
        });
    </script>

    <script>
        $(document).on('click', ".delete", function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            var id = $(this).closest('tr').find('.id').text();
            Swal.fire({
                title: "Apakah Anda Yakin",
                text: "Data yang terhapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!"
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        });
    </script>
@endpush
