<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
        //Table name
        protected $table = 'returs';
        // primary key
        public $primaryKey = 'id';
        // timestamp
        public $timestamps = true;
}
