<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    //Table Name
    protected $table = 'carts';

    // primary key
    public $primaryKey = 'id';

    // photo

    // timestaps
    public $timestamp = true; //jika ingin di disable tinggal ganti false
}
