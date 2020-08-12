<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePengiriman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->foreignID('penjualan_id')->references('id')->on('penjualan');
            $table->foreignID('driver_id')->references('id')->on('drivers');
            $table->date('tanggal_pengiriman');
            $table->string('status',20);
            $table->string('prioritas',20);
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
        Schema::dropIfExists('pengiriman');
    }
}
