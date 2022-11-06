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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan')->nullable();
            $table->string('nama');
            $table->string('ukuran');
            $table->double('harga');
            $table->integer('jumlah');
            $table->integer('total');
            $table->string('tgl_pesan');
            $table->boolean('status')->default(0);
            $table->string('nama_pemesan');
            $table->string('alamat_pemesan');
            $table->string('no_pemesan');
            $table->integer('kain');
            $table->integer('benang');
            $table->integer('id_produk');
            $table->string('estimasi');
            $table->integer('total_estimasi');
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
        Schema::dropIfExists('pesanans');
    }
};
