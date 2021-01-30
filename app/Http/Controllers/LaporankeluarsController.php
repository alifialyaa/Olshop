<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporankeluar;

class LaporankeluarsController extends Controller
{
    public function index()
    {
        $laporans = Laporankeluar::all();
        // $categories = Category::all();
        return view ('laporans.keluars.index')->with('laporans', $laporans);
    }

    public function filter(Request $request)
    {
        
    }

    public function create()
    {
        // $id_karyawan = $id;
        return view('laporans.keluars.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'deskripsi' => 'required',
            'total' => 'required',
        ]);

        $laporan = new Laporankeluar;
        $laporan->karyawan_id = auth()->user()->id;
        $laporan->deskripsi = $request->input('deskripsi');
        $laporan->total = $request->input('total');
        $laporan->save();

        // return view('karyawans.index');
        return back()->with('success_message', 'Item has been removed');
    }
}
