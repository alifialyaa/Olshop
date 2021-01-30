<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Transaksi extends Model
{
    protected $guarded = array();  // Important

    //Table Name
    protected $table = 'transaksis';

    // primary key
    public $primaryKey = 'id';

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
        // return $this->belongsToMany('App\Product', 'product_id', 'transaksi_id', 'quantity');
        // return $this->belongsToMany(Transaksi::class);
    }

    // photo

    // timestaps
    public $timestamp = true; //jika ingin di disable tinggal ganti false
}
