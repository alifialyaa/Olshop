<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Kinerja;
use DB;

class KinerjasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:karyawan', ['except' => ['indexPemilik', 'filter']]);
    }
    public function index($id)
    {
        // dd($id);
        // if (Auth::guard('pemilik')->check()=='pemilik')
        // {
        //     // $kinerjas = DB::table('kinerjas')->where('id_karyawan', $id)->get();

        //     // $kinerjas = Kinerja::All();
        //     // return view('pemiliks.kinerjas.index')->with('kinerjas', $kinerjas);    
        //     return dd('masuk');
        // }
        // if (Auth::guard('karyawan')->check()=='karyawan')
        // {
            $kinerjas = DB::table('kinerjas')->where('id_karyawan', $id)->get();
            return view('karyawans.kinerjas.index')->with('kinerjas', $kinerjas);
        // }
        // $kinerjas = Kinerja::Find($);
        // dd($kinerjas);

        // return dd('masuk')
        // $kinerjas = DB::table('kinerjas')->where('id_karyawan', $id)->get();
        // return view('karyawans.kinerjas.index')->with('kinerjas', $kinerjas);
    }

    public function indexPemilik()
    {
        // dd($id);
        // if (Auth::guard('pemilik')->check()=='pemilik')
        // {
        //     // $kinerjas = DB::table('kinerjas')->where('id_karyawan', $id)->get();

        //     // $kinerjas = Kinerja::All();
        //     // return view('pemiliks.kinerjas.index')->with('kinerjas', $kinerjas);    
        //     return dd('masuk');
        // }
        // if (Auth::guard('karyawan')->check()=='karyawan')
        // {
        //     $kinerjas = DB::table('kinerjas')->where('id_karyawan', $id)->get();
        //     return view('karyawans.kinerjas.index')->with('kinerjas', $kinerjas);
        // }
        // $kinerjas = Kinerja::Find($);
        // dd($kinerjas);

        // return dd('masuk')
        // $kinerjas = DB::table('kinerjas')->where('id_karyawan', $id)->get();
        // return view('karyawans.kinerjas.index')->with('kinerjas', $kinerjas);
        $kinerjas = Kinerja::All();
        return view('pemiliks.kinerjas.index')->with('kinerjas', $kinerjas);    
    }

    public function filter(Request $request)
    {
        dd($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // $kinerja = Kinerja::find($id);
        $id_karyawan = $id;
        return view('karyawans.kinerjas.create')->with('id_karyawan', $id_karyawan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $this->middleware('auth:karyawan');
        $this->validate($request,[
            'deskripsi' => 'required',
        ]);
        
        $kinerja = new Kinerja;
        $kinerja->id_karyawan = auth()->user()->id;
        // $kinerja->id_karyawan = $id;
        $kinerja->deskripsi = $request->input('deskripsi');
        $kinerja->save();

        // return redirect()->back();
        // return redirect()->action('KinerjasController@index', ['id' => $kinerja->id_karyawan]);
        // return redirect()->action('KinerjasController@index', ['id' => $kinerja->id_karyawan])->with('message', 'Kinerja berhasil dibuat');
        // return redirect('/karyawan/kinerja/'.$kinerja->id_karyawan)->with('success', 'Category Created')->middleware('auth:karyawan')->name('karyawans.kinerjas.index');
        return redirect('/karyawan');
        // return redirect('states/'.$id.'/regions')->with('message', 'State saved correctly!!!');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
