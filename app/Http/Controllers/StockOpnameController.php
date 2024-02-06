<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StockOpname;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StockOpnameController extends Controller
{
    public function index()
    {
        return view('StockOpname.index', ['StockOpnames' => StockOpname::all()]);
    }

    public function create()
    {
        return view('StockOpname.create', ['barangs' => Barang::all(), 'users' => User::all()]);

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

        $validated = $request->validate([
            'barang_id' => 'required|max:255',
            'user_id' => 'required|max:255',
            'sisa_stok' => 'required|min:1',
            'stok_update' => 'required|min:1',
        ]);
        if (StockOpname::create($validated)) {
            $barang = Barang::find($validated['barang_id']);
            $barang->stok = $validated['stok_update'];
            $barang->save();
        }
        Alert::success('Hore!', 'Stok Opname berhasil ditambahkan!');
        return redirect()->back();
    }
}
