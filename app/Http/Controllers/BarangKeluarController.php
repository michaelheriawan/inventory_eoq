<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarangKeluarController extends Controller
{
    public function index()
    {
        return view('BarangKeluar.index', ['BarangKeluars' => BarangKeluar::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BarangKeluar.create', ['barangs' => Barang::all(), 'users' => User::all()]);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(BarangKeluar::join('barang', 'barang.id_barang', '=', 'barang_id')
                ->join('kategori', 'kategori.id_kategori', '=', 'barang.kategori')
                ->where('barang_keluar.id_barang_keluar', $id)
                ->get(['barang_keluar.*', 'kategori.nama as kategori', 'barang.gambar', 'barang.nama as barang'])->first());
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
            'user_id' => 'required|max:255',
            'jumlah_keluar' => 'required|min:1',
            'keterangan' => 'max:500',
        ]);

        if (BarangKeluar::create($validated)) {
            $barang = Barang::find($validated['barang_id']);
            $barang->stok = $barang->stok - $validated['jumlah_keluar'];
            $barang->save();
        }
        Alert::success('Hore!', 'Barang berhasil dikurangkan!');
        return redirect()->back();
    }
}
