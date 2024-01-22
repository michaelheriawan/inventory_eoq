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
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->unsignedBigInteger('id_barang_masuk')->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id_user')->on('users');
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')->references('id_barang')->on('barangs');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id_supplier')->on('suppliers');
            $table->unsignedInteger('jumlah_masuk');
            $table->text('keterangan');
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
        Schema::dropIfExists('barang_masuks');
    }
};
