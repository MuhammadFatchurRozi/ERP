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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('id_product');
            $table->string('kode_order');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('nama_produk');
            $table->string('ukuran');
            $table->integer('harga');
            $table->integer('quantity');
            $table->double('total');
            $table->string('tgl_pemesanan');
            $table->string('tgl_pembayaran');
            $table->integer('status');   
            $table->string('last_paid')->nullable();
            $table->integer('register_payment');
            $table->integer('validate');
            $table->integer('paid');
            $table->integer('delivery');
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
        Schema::dropIfExists('orders');
    }
};
