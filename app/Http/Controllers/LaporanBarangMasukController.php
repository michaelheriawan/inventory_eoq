<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LaporanBarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BarangMasuk::with("suppliers", "barangs")->get();

            if ($request->filled('from_date') && $request->filled('to_date')) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('barang.nama', function ($data) {
                    return $data->barangs->nama;
                })
                ->editColumn('supplier.nama', function ($data) {
                    return $data->suppliers->nama;
                })
                ->addColumn('aksi', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('LaporanBarangMasuk.index', );

    }
}
