<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Supplier.index', ['suppliers' => Supplier::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Supplier.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Supplier::create($request->validate([
            'nama' => 'required|unique:suppliers|max:255',
            'email' => 'required|max:255',
            'No_Tlp' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_usaha' => 'required|max:255',
        ]));
        Alert::success('Hore!', 'Supplier baru berhasil ditambahkan!');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('Supplier.edit', ['detail_supplier' => $supplier]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|max:255',
            'No_Tlp' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_usaha' => 'required|max:255',
        ]));
        Alert::success('Hore!', 'Supplier berhasil diubah!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        Alert::success('Hore!', 'Supplier berhasil dihapus!');
        return redirect()->back();
    }
}
