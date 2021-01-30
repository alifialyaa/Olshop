<?php

namespace App\Http\Controllers;
use App\Laporanmasuk;

use Illuminate\Http\Request;

class LaporanmasuksController extends Controller
{
    public function index()
    {
        $laporanmasuks = Laporanmasuk::all();
        return view('laporans.masuks.index')->with('laporanmasuks', $laporanmasuks);
    }

    public function filter(Request $request)
    {
        
    }
}
