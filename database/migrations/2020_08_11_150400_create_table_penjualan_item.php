<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePenjualanItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_item', function (Blueprint $table) {
            $table->id();
            $table->foreignID('penjualan_id')->references('id')->on('penjualan');
            $table->foreignID('product_id')->references('id')->on('products');
            $table->integer('quantity');
            $table->string('unit_id')->references('id')->on('units');
            $table->decimal('unit_price',25,2)->default(0.00);
            $table->integer('total');
            $table->integer('quantity_sent')->default(0);
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
        Schema::dropIfExists('penjualan_item');
    }
}
