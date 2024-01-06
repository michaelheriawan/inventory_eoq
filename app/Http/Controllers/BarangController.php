<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Barang.index', ['barangs' => Barang::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Barang.create', ['kategoris' => Kategori::all()]);

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
            'nama' => 'required|unique:barangs|max:255',
            'kategori' => 'required|max:255',
            'gambar' => 'required|image',
            'stok' => 'required|min:1',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        if ($request->has('gambar')) {
            $imagePath = $request->file('gambar')->store('barang', 'public');
            $validated['gambar'] = $imagePath;

        }
        Barang::create($validated);
        Alert::success('Hore!', 'Barang baru berhasil ditambahkan!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('Barang.edit', ['kategoris' => Kategori::all(), 'detail_barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {

        $validated = $request->validate([
            'nama' => 'required|max:255',
            'kategori' => 'required|max:255',
            'gambar' => 'required|max:255',
            'stok' => 'required|min:1',
            'gambar' => 'image|mimes:jpeg,png,jpg',
        ]);

        if ($request->has('gambar')) {
            $imagePath = $request->file('gambar')->store('barang', 'public');
            $validated['gambar'] = $imagePath;
            if (!is_null($barang->gambar)) {
                Storage::disk('public')->delete($barang->gambar);
            }
        }

        $barang->update($validated);
        Alert::success('Hore!', 'Barang berhasil diubah!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        Alert::success('Hore!', 'Barang berhasil dihapus!');
        return redirect()->back();

    }
}
