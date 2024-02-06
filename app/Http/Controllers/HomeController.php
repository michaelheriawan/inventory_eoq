<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('welcome', ['Barang' => Barang::all()->count(), 'User' => User::all()->count(), 'BarangMasuk' => BarangMasuk::all()->count(), 'BarangKeluar' => BarangKeluar::all()->count()]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profile', ['User' => $user]);

    }
}
