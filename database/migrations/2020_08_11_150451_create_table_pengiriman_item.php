<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePengirimanItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman_item', function (Blueprint $table) {
            $table->id();
            $table->foreignID('pengiriman_id')->references('id')->on('pengiriman');
            $table->foreignID('penjualan_item_id')->references('id')->on('penjualan_item');
            $table->integer('quantity');
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
        Schema::dropIfExists('pengiriman_item');
    }
}
