<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('BarangMasuk.index', ['BarangMasuks' => BarangMasuk::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BarangMasuk.create', ['barangs' => Barang::all(), 'users' => User::all(), 'suppliers' => Supplier::all()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(BarangMasuk::join('barang', 'barang.id_barang', '=', 'barang_id')
                ->join('kategori', 'kategori.id_kategori', '=', 'barang.kategori')
                ->where('barang_masuk.id_barang_masuk', $id)
                ->get(['barang_masuk.*', 'kategori.nama as kategori', 'barang.gambar', 'barang.nama as barang', 'barang.harga_beli'])->first());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fetchHargaBeli(Barang $barang)
    {
        return response()->json($barang);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'barang_id' => 'required|max:255',
            'supplier_id' => 'required|max:255',
            'user_id' => 'required|max:255',
            'jumlah_masuk' => 'required|min:1',
            'harga_beli' => 'required|min:1',
            'keterangan' => 'max:500',
        ]);

        if (BarangMasuk::create($validated)) {
            $barang = Barang::find($validated['barang_id']);
            $barang->stok = $barang->stok + $validated['jumlah_masuk'];
            $barang->save();
        }
        Alert::success('Hore!', 'Barang baru berhasil ditambahkan!');
        return redirect()->back();
    }
}
