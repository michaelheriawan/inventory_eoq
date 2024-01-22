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
