<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasans';
    // primary key
    public $primaryKey = 'id';
    // timestamp
    public $timestamps = true;
}
