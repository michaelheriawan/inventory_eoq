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
        Schema::create('barang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_barang')->autoIncrement();
            $table->unsignedBigInteger('kategori');
            $table->foreign('kategori')->references('id_kategori')->on('kategori');
            $table->string('nama', 50);
            $table->unsignedInteger('stok');
            $table->text('gambar')->nullable();
            $table->unsignedInteger('harga_beli');
            $table->unsignedInteger('harga_jual');

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

        Schema::dropIfExists('barang');
    }
};
