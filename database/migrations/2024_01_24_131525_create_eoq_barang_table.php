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
        Schema::create('eoq_barang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_eoq_barang')->autoIncrement();
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')->references('id_barang')->on('barang');
            $table->string('bulan', 15);
            $table->string('tahun', 4);
            $table->unsignedInteger('jumlah_permintaan');
            $table->unsignedInteger('harga_barang');
            $table->unsignedInteger('biaya_pesan');
            $table->unsignedInteger('biaya_simpan');
            $table->unsignedInteger('eoq');
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
        Schema::dropIfExists('eoq_barang');
    }
};
