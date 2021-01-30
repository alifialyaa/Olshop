<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ulasan;
use App\Transaksi;


class UlasansController extends Controller
{
    public function index($id)
    {
        // 
    }

    public function indexPemilik()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'deskripsi' => 'required',
            'rating' => 'required'
        ]);

        $id_pembeli = auth()->user()->id;
        $transaksi = Transaksi::where('id_pembeli', $id_pembeli)->orderBy('updated_at', 'desc')->first();

        $ulasan = new Ulasan;
        $ulasan->deskripsi = $request->input('deskripsi');
        $ulasan->rating = $request->input('rating');
        $ulasan->id_produk = $request->input('id_produk');
        $ulasan->id_transaksi = $transaksi->id;
        $ulasan->save();

        $transaksi->save();

        return back();


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
