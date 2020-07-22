<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->date('purchase_date');
            $table->foreignID('suplier_id');
            $table->foreignID('sales_id');
            $table->string('reference_no')->nullable();
            $table->decimal('total',25,4)->default(0.0000);
            $table->string('purchase_status',20);
            $table->string('payment_status',20);
            $table->decimal('paid_amount',25,4)->default(0.0000);
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
        Schema::dropIfExists('purchases');
    }
}
