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
        Schema::create('puchase_orders', function (Blueprint $table) {
            $table->id();
            $table->boolean('receive')->default(0);
            $table->integer('validate');
            $table->integer('paid');
            $table->string('kode_rfq');
            $table->string('nama_vendor');
            $table->string('alamat');
            $table->string('nohp');
            $table->string('nama_bahan_baku');
            $table->integer('harga');
            $table->integer('quantity');
            $table->integer('total');
            $table->string('tgl_pesan');
            $table->string('tgl_bayar');
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
        Schema::dropIfExists('puchase_orders');
    }
};
