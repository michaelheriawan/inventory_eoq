@extends('layouts.main')
@section('contents')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon icon-white"><i data-feather="arrow-up-circle"></i></div>
                                Barang Masuk
                            </h1>
                            {{-- <div class="page-header-subtitle">A simplified page header for use with the dashboard layout
                            </div> --}}
                        </div>
                        <div class="col-12 col-xl-auto mt-4">
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
                            <a class="btn btn-sm btn-light text-primary shadow" href="{{ route('barang-masuk.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus me-1">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Tambah Barang Masuk
                            </a>
                        </div>
                    </div>
                    <nav class="mt-4 rounded" aria-label="breadcrumb">
                        <ol class="breadcrumb px-3 py-2 rounded mb-0">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active">Barang Masuk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </header>

        <!-- Main page content-->
        <div class="container-xl px-4">
            <div class="card">
                <div class="card-body">
                    <table id="myTable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Masuk</th>
                                <th>Jumlah</th>
                                <th>Supplier</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Masuk</th>
                                <th>Jumlah</th>
                                <th>Supplier</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($BarangMasuks as $item)
                                <tr>
                                    <td class="id">{{ $item->id_barang_masuk }}</td>
                                    <td class="nama">{{ $item->barangs->nama }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->jumlah_masuk }}</td>
                                    <td>{{ $item->suppliers->nama }}</td>
                                    <td>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-1"
                                            href="{{ route('barang.edit', ['barang' => $item->id_barang_masuk]) }}"
                                            id="myDiv"><i data-feather="edit"></i></a>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-1 detail_data"
                                            href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                data-feather="eye"></i></a>
                                        {{-- <form action="{{ route('barang.destroy', ['barang' => $barang->id_barang_masuk]) }}"
                                            method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark delete"
                                                type="submit"><i data-feather="trash-2"></i></button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Barang</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <img src="" alt="" height="150" class="d_gambar">
                        </div>

                        <table class="table table-striped-columns mt-1">
                            <tr>
                                <td width="50%">Kategori</td>
                                <td id="d_kategori"></td>
                            </tr>
                            <tr>
                                <td width="50%">Nama Barang</td>
                                <td id="d_nama"></td>
                            </tr>
                            <tr>
                                <td width="50%">Qty</td>
                                <td id="d_jumlah_masuk"></td>
                            </tr>
                            <tr>
                                <td width="50%">Tanggal dibuat</td>
                                <td id="d_created"></td>
                            </tr>
                            <tr>
                                <td width="50%">Tanggal diubah</td>
                                <td id="d_updated"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>

                    </div>
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
        // Shorthand for $( document ).ready()
        $(function() {
            let table = new DataTable('#myTable');
            $('.detail_data').click(function() {
                var tr_id = $(this).closest('tr').find('.id').text();
                var url = "{{ route('barang-masuk.show', ['barang_masuk' => ':id']) }}";
                url = url.replace(':id', tr_id);
                let src_gambar = "{{ asset('storage/' . ':gambar') }}"
                moment.locale('id');
                $.get(url,
                    function(data) {

                        console.log(data);
                        if (data.gambar) {
                            src_gambar = src_gambar.replace(':gambar', data.gambar);
                            $('.d_gambar').attr('src', src_gambar);
                        } else {
                            $('.d_gambar').attr('src',
                                'https://placehold.jp/150x150.png?text=No+image');
                        }

                        $('#d_kategori').text(data.kategori);
                        $('#d_nama').text(data.barang);
                        $('#d_jumlah_masuk').text(data.jumlah_masuk);

                        // $('#d_created').text(data.created_at.split('T')[0]);
                        $('#d_created').text(moment(data.created_at).format('L'));
                        $('#d_created').text(moment(data.updated_at).format('L'));


                    })
            });
        });
    </script>
@endpush
