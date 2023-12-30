<?php

namespace App\Http\Controllers;

use App\Models\Pengambil;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengambilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Pengambil.index', ['pengambils' => Pengambil::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pengambil.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pengambil::create($request->validate([
            'nama' => 'required|unique:pengambils|max:255',
            'email' => 'required|max:255',
            'No_Tlp' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_usaha' => 'required|max:255',
        ]));
        Alert::success('Hore!', 'Pengambil baru berhasil ditambahkan!');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengambil  $pengambil
     * @return \Illuminate\Http\Response
     */
    public function show(Pengambil $pengambil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengambil  $pengambil
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengambil $pengambil)
    {
        return view('Pengambil.edit', ['detail_pengambil' => $pengambil]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengambil  $pengambil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengambil $pengambil)
    {
        $pengambil->update($request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|max:255',
            'No_Tlp' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_usaha' => 'required|max:255',
        ]));
        Alert::success('Hore!', 'Pengambil berhasil diubah!');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengambil  $pengambil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengambil $pengambil)
    {
        $pengambil->delete();
        Alert::success('Hore!', 'Pengambil berhasil dihapus!');
        return redirect()->back();

    }
}
