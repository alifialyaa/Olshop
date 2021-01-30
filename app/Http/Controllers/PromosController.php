<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Promo;

class PromosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pemilik');
    }
    public function index()
    {
        $promo = Promo::All();
        return view('pemiliks.promos.index')->with('promo', $promo);
        // dd('masuk');
    }

    public function create()
    {
        return view('pemiliks.promos.create');
        // dd('masuk');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);
        
        $date1 = str_replace('.', '-', $request->input('tanggal_mulai'));
        $date2 = str_replace('.', '-', $request->input('tanggal_selesai'));

        $promo = new Promo;
        $promo->kode = $request->input('kode');
        $promo->nama = $request->input('nama');
        $promo->value = $request->input('value');
        $promo->deskripsi = $request->input('deskripsi');
        $promo->tanggal_mulai = $date1;
        $promo->tanggal_selesai = $date2;
        // $promo->tanggal_selesai = date("d-m-Y", strtotime($request->input('tanggal_selesai')));
        // $promo->tanggal_selesai = $request->input('tanggal_selesai');
        $promo->save();
        // $t = $request->input('tanggal_selesai');
        // dd('masuuuuuuuuuuuuuuuuuuuuuuuuuuuuuk');

        // return redirect()->back();
        // return redirect()->action('KinerjasController@index', ['id' => $kinerja->id_karyawan]);
        // return redirect()->action('KinerjasController@index', ['id' => $kinerja->id_karyawan])->with('message', 'Kinerja berhasil dibuat');
        // return redirect('/karyawan/kinerja/'.$kinerja->id_karyawan)->with('success', 'Category Created')->middleware('auth:karyawan')->name('karyawans.kinerjas.index');
        return redirect('/pemilik/promo');
    }

    
    

}
