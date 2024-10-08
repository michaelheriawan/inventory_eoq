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
        Schema::create('supplier', function (Blueprint $table) {
            $table->unsignedBigInteger('id_supplier')->autoIncrement();
            $table->string('nama', 100);
            $table->string('email', 50);
            $table->string('no_tlp', 15);
            $table->text('alamat');
            $table->string('nama_usaha', 50);
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

        Schema::dropIfExists('supplier');
    }
};
