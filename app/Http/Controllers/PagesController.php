<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return redirect ('/index');
        // return view('categories.index');
    }

    public function pemilik()
    {
        return view('pemilik');
    }

    public function masuk()
    {
        return view('login');
    }

    public function logout()
    {
        return view('categories.index');
    }

    public function detil_kategori()
    {
        return view('kategoriDetil');
    }

    public function tkategori()
    {
        return view('tkategori');
    }

    public function daftar()
    {
        return view('daftar');
    }

    public function hapusKategori()
    {
        return view('hapusKategori');
    }

    public function tproduk()
    {
        return view('tproduk');
    }

    public function detil()
    {
        return view('kategoriDetil');
    }
    public function nyoba()
    {
        return view('pemiliks.promos.index');
    }

    

    
}
