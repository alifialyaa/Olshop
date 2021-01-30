<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Table Name
    protected $table = 'categories';

    // primary key
    public $primaryKey = 'id';

    // photo

    // timestaps
    public $timestamp = true; //jika ingin di disable tinggal ganti false
}


