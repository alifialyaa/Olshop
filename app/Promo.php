<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    
    //Table name
    protected $table = 'promos';
    // primary key
    public $primaryKey = 'id';
    // timestamp
    public $timestamps = true;

    public function findCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function diskon($total)
    {
        return ($this->value / 100) * $total;
    }
}
