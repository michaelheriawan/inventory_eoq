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
        Schema::create('stock_opname', function (Blueprint $table) {
            $table->unsignedBigInteger('id_stock_opname')->autoIncrement();
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('barang_id')->references('id_barang')->on('barang');
            $table->foreign('user_id')->references('id_user')->on('user');
            $table->unsignedInteger('sisa_stok');
            $table->unsignedInteger('stok_update');
            // $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('stock_opname');
    }
};
