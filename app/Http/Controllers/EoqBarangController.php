<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\EoqBarang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EoqBarangController extends Controller
{
    public function index()
    {
        return view('EoqBarang.index', ['EoqBarangs' => EoqBarang::all()]);
    }
    public function create()
    {
        return view('EoqBarang.create', ['barangs' => Barang::all()]);

    }

    public function edit(EoqBarang $eoqBarang)
    {
        return view('EoqBarang.edit', ['barangs' => Barang::all(), 'eoq' => $eoqBarang]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        EoqBarang::create($request->validate([
            'barang_id' => 'required|max:255',
            'bulan' => 'required|max:255',
            'jumlah_permintaan' => 'required|min:1',
            'harga_barang' => 'required|min:1',
            'biaya_pesan' => 'required|min:1',
            'biaya_simpan' => 'required|min:1',
            'eoq' => 'required|min:1',
        ]));
        Alert::success('Hore!', 'Eoq berhasil ditambahkan!');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EoqBarang $eoqBarang)
    {
        $eoqBarang->update($request->validate([
            'barang_id' => 'required|max:255',
            'bulan' => 'required|max:255',
            'jumlah_permintaan' => 'required|min:1',
            'harga_barang' => 'required|min:1',
            'biaya_pesan' => 'required|min:1',
            'biaya_simpan' => 'required|min:1',
            'eoq' => 'required|min:1',
        ]));
        Alert::success('Hore!', 'Eoq berhasil diubah!');
        return redirect()->back();
    }
}
