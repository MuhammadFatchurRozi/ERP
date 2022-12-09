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
            $table->string('kode_sales');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('nama_produk');
            $table->double('harga');
            $table->integer('quantity');
            $table->double('total');
            $table->string('tgl_pemesanan');
            $table->string('tgl_pembayaran');
            $table->integer('status');
            $table->integer('register_payment');
            $table->integer('validate');
            $table->integer('paid');
            $table->integer('delivery');
            $table->integer('invoice');
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
