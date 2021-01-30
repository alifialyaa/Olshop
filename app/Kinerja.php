<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    //Table name
    protected $table = 'kinerjas';
    // primary key
    public $primaryKey = 'id';
    // timestamp
    public $timestamps = true;
}
