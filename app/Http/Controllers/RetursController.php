<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Retur;

class RetursController extends Controller
{
    public function index()
    {
        $retur = Retur::All();
        return view('karyawans.returs.index')->with('retur', $retur);
    }

    public function create()
    {
        return view('returs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'transaksi_id' => 'required',
            'alasan' => 'required',
            'foto' => 'image|nullable|max:1999'
        ]);

        // handle file upload
        if($request->hasFile('foto')){
            // get filename with the extension
            $filenameWithExt1 = $request->file('foto')->getClientOriginalName();
            // get just filename
            $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
            // get just ext
            $extension1 = $request->file('foto')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore1 = $filename1.'_'.time().'.'.$extension1;
            // upload image
            $path = $request->file('foto')->storeAs('public/retur', $fileNameToStore1);
        }
        else{
            $fileNameToStore1 = 'noimage.jpg';
        }
        
        $transaksi = Transaksi::where('id', $request->input('transaksi_id'))->first();
        if($transaksi == null)
        {
            // return redirect('/index')->withErrors('Masa berlaku promo telah berakhir');
            return redirect()->back()->withErrors('kode transaksi tidak dapat ditemukan');
        }
        // Create category
        $retur = new Retur;
        $retur->transaksi_id = $request->input('transaksi_id');
        $retur->alasan = $request->input('alasan');
        $retur->foto = $fileNameToStore1;;
        

        $transaksi->id_retur = $retur->id;

        $retur->save();   
        $transaksi->save();   
    }
}
