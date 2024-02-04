@extends('layouts.main')
@section('contents')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon icon-white"><i data-feather="file-text"></i></div>
                                Laporan Barang Masuk
                            </h1>
                            {{-- <div class="page-header-subtitle">A simplified page header for use with the dashboard layout
                            </div> --}}
                        </div>
                        <div class="col-12 col-xl-auto mt-4">
                            <div class="d-flex">
                                <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                                    <span class="input-group-text"><i class="text-primary"
                                            data-feather="calendar"></i></span>
                                    <input class="form-control ps-0 pointer" id="litepicker"
                                        placeholder="Select date range..." />

                                </div>
                                <div class="ms-2">
                                    <button class="btn btn-primary btn-icon rounded-1 shadow-sm" type="button"
                                        id="btnClear">
                                        <i data-feather="search" class="text-light" style="width: 1rem; height: 1rem;"></i>
                                    </button>
                                </div>
                            </div>


                        </div>
                    </div>
                    <nav class="mt-4 rounded" aria-label="breadcrumb">
                        <ol class="breadcrumb px-3 py-2 rounded mb-0">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active">Laporan Barang Masuk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </header>

        <!-- Main page content-->
        <div class="container-xl px-4">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3>Daftar Barang Masuk</h3>

                    </div>
                    <table class="data-table" style="width:100%">
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
                            {{-- @foreach ($BarangMasuks as $item)
                                <tr>
                                    <td class="id">{{ $item->id_barang_masuk }}</td>
                                    <td class="nama">{{ $item->barangs->nama }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->jumlah_masuk }}</td>
                                    <td>{{ $item->suppliers->nama }}</td>
                                    <td>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                            href="{{ route('barang.edit', ['barang' => $item->id_barang_masuk]) }}"
                                            id="myDiv"><i data-feather="edit"></i></a>
                                        {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark delete" href="#!"><i
                                                data-feather="trash-2"></i></a> --}}
                            {{-- <form action="{{ route('barang.destroy', ['barang' => $barang->id_barang_masuk]) }}"
                                            method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark delete"
                                                type="submit"><i data-feather="trash-2"></i></button>
                                        </form> --}}
                            {{-- </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('ui/js/moment.js') }}"></script>
    <script src="{{ asset('ui/js/moment-with-locales.js') }}"></script>
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/b-html5-2.4.2/datatables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/b-html5-2.4.2/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            moment.locale('id');
            const picker = new Litepicker({
                element: document.getElementById('litepicker'),
                resetButton: true,
                startDate: new Date(),
                endDate: new Date(),
                singleMode: false,
                numberOfMonths: 2,
                numberOfColumns: 2,
                format: 'DD MMM, YYYY',
                plugins: ['ranges'],
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('laporan_barang_masuk.index') }}",
                    data: function(d) {
                        d.from_date = moment(picker.getDate().toDateString()).format('YYYY-MM-DD');
                        d.to_date = moment(picker.getEndDate().toDateString()).format('YYYY-MM-DD');
                    }
                },
                columns: [{
                        data: 'id_barang_masuk',
                        name: 'id_barang_masuk'
                    },
                    {
                        data: 'barang.nama',
                        name: 'barang.nama'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'jumlah_masuk',
                        name: 'jumlah_masuk'
                    },
                    {
                        data: 'supplier.nama',
                        name: 'supplier.nama'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    },
                ],
                columnDefs: [{
                    target: [2],
                    render: function(data, type, row) {
                        return moment(data).format('L');
                    }
                }]

            });
            $('#btnClear').click(function() {

                //console.log(moment(picker.getDate()).format('YYYY-MM-DD'));
                // console.log(picker.getEndDate());
                // console.log(picker.getEndDate().toDateString());
                // console.log(moment(picker.getDate().toDateString()).format('YYYY-MM-DD'));
                // console.log(moment(picker.getEndDate().toDateString()).format('YYYY-MM-DD'));
                table.draw();

            });
        });
    </script>
@endpush
