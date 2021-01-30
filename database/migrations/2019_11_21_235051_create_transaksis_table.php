<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pembeli');
            $table->unsignedInteger('id_laporan')->nullable();
            $table->unsignedInteger('id_retur')->nullable();
            $table->unsignedInteger('id_promo')->nullable();
            $table->unsignedInteger('total_harga')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kode_pos')->nullable();
            $table->integer('status')->nullable();
            $table->string('bukti_tf')->nullable();
            $table->integer('ongkir')->nullable();
            $table->string('kurir')->nullable();
            $table->string('resi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
