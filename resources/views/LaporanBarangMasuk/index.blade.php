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

                    {{-- <label class="category-filter d-flex me-1">Barang :
                        <select class="form-select form-select-sm" aria-label="Default select example">
                            <option selected>Pilih Barang</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </label> --}}

                    <table id="myTable" style="width:100%">
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
            var table = $('#myTable').DataTable({
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
                        className: 'id',
                        data: 'id_barang_masuk',
                        name: 'id_barang_masuk',
                        width: '10px'
                    },
                    {
                        data: 'barang.nama',
                        name: 'barang.nama',

                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        width: '15%'
                    },
                    {
                        data: 'jumlah_masuk',
                        name: 'jumlah_masuk',
                        width: '15px'
                    },
                    {
                        data: 'supplier.nama',
                        name: 'supplier.nama',
                        width: '17%'
                    },
                    {
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        className: "clickable",
                        "render": function(data, type, row, meta) {

                            //console.log(row);
                            //console.log(partNo);
                            return "<a class='btn btn-datatable btn-icon btn-transparent-dark me-1 detail_data' href='#' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id='" +
                                row.id_barang_masuk + "'><i data-feather='eye'></i></a>";
                            /*return "<a href='#' id='hlinkView' class='ti-eye' data-toggle='modal' data-target='#exampleModal' onclick='getPartDetailsByPartNumber(" + partNo + ")'></a>";*/
                        },
                    },
                ],
                columnDefs: [{

                    target: [2],
                    render: function(data, type, row) {
                        return moment(data).format('L');
                    }
                }],
                "drawCallback": function(settings) {
                    feather.replace();
                }

            });
            $('#btnClear').click(function() {

                //console.log(moment(picker.getDate()).format('YYYY-MM-DD'));
                // console.log(picker.getEndDate());
                // console.log(picker.getEndDate().toDateString());
                // console.log(moment(picker.getDate().toDateString()).format('YYYY-MM-DD'));
                // console.log(moment(picker.getEndDate().toDateString()).format('YYYY-MM-DD'));
                table.draw();

            });
            $("#myTable").on("click", "td.clickable", function() {
                let cellText = $(this).children("a:first").data("id");
                var url = "{{ route('barang-masuk.show', ['barang_masuk' => ':id']) }}";
                url = url.replace(':id', cellText);
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
