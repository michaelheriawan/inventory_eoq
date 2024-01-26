<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\EoqBarang;

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
}
