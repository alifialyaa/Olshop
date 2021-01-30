<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaksi;

class Product extends Model
{
    protected $guarded = array();  // Important
    //Table Name
    protected $table = 'products';

    // primary key
    public $primaryKey = 'id';

    public function transaksis(){
        return $this->belongsToMany(Transaksi::class)->withPivot('quantity');
        // return $this->belongsToMany('App\Transaksi', 'product_id', 'transaksi_id', 'quantity');
    }

    // photo

    // timestaps
    public $timestamp = true; //jika ingin di disable tinggal ganti false

    //kategori
}

