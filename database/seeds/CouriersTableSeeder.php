<?php

use App\Courier;
use Illuminate\Database\Seeder;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            ['code' => 'jne', 'nama' => 'JNE'],
            ['code' => 'pos', 'nama' => 'POS'],
            ['code' => 'tiki', 'nama' => 'TIKI']
        ];
        Courier::insert($data);
    }
}
