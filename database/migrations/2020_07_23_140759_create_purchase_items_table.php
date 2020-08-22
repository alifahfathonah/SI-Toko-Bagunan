<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->foreignID('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
            $table->string('product_name', 100);
            $table->string('unit_id')->references('id')->on('units');
            $table->integer('quantity');
            $table->decimal('unit_price', 25, 2)->default(0.00);
            $table->integer('total');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_items');
    }
}
