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
        Schema::create('confirm_orders', function (Blueprint $table) {
            $table->id();
                //relastionship from table id_vendor (confirm_order) to id (vendors)
                $table->unsignedBigInteger('id_vendor')->on('vendors')->references('id');
            $table->string('kode_rfq');
            $table->string('nama_vendor');
            $table->string('alamat');
            $table->string('nohp');
            $table->string('nama_produk');
            $table->integer('harga');
            $table->integer('quantity');
            $table->integer('total');
            $table->string('tgl_pesan');
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
        Schema::dropIfExists('confirm_orders');
    }
};
