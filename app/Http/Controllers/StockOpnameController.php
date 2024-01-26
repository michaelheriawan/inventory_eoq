<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StockOpname;
use App\Models\User;

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

}
