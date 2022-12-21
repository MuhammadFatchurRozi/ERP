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
        Schema::create('accounting_customers', function (Blueprint $table) {
            $table->id();
            $table->string('kode_accounting_customer');
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
            $table->string('status');
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
        Schema::dropIfExists('accounting_customers');
    }
};
