<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quatations', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sales');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('nama_produk');
            $table->integer('harga');
            $table->integer('quantity');
            $table->double('total');
            $table->string('tgl_pemesanan');
            $table->string('tgl_pembayaran');
            $table->integer('status');
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
        Schema::dropIfExists('quatations');
    }
};
