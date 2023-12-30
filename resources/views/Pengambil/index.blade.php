@extends('layouts.main')
@section('contents')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon icon-white"><i data-feather="clipboard"></i></div>
                                Pengambil
                            </h1>
                            <div class="page-header-subtitle">A simplified page header for use with the dashboard layout
                            </div>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            {{-- <button class="btn btn-sm btn-light text-primary shadow" type="button" data-bs-toggle="modal"
                                data-bs-target="#createGroupModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus me-1">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Tambah Barang Baru
                            </button> --}}
                            <a class="btn btn-sm btn-light text-primary shadow" href="{{ route('pengambil.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus me-1">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Tambah Pengambil Baru
                            </a>
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
                                <th>ID Pengambil</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>No.Tlp</th>
                                <th>Usaha</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID Pengambil</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>No.Tlp</th>
                                <th>Usaha</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pengambils as $pengambil)
                                <tr>
                                    <td class="id">{{ $pengambil->id_pengambil }}</td>
                                    <td class="nama">{{ $pengambil->nama }}</td>
                                    <td>{{ $pengambil->email }}</td>
                                    <td>{{ $pengambil->alamat }}</td>
                                    <td>{{ $pengambil->No_Tlp }}</td>
                                    <td>{{ $pengambil->nama_usaha }}</td>
                                    <td>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                            href="{{ route('pengambil.edit', ['pengambil' => $pengambil->id_pengambil]) }}"
                                            id="myDiv"><i data-feather="edit"></i></a>
                                        {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark delete" href="#!"><i
                                                data-feather="trash-2"></i></a> --}}
                                        <form
                                            action="{{ route('pengambil.destroy', ['pengambil' => $pengambil->id_pengambil]) }}"
                                            method="post" class="d-inline">
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
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
