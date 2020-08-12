<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('reference_no')->nullable();
            $table->decimal('grandtotal',25,2)->default(0.00);
            $table->string('sale_status',20)->nullable();
            $table->string('payment_status',20)->nullable();
            $table->decimal('paid_amount',25,2)->default(0.00);
            $table->string('nama_pembeli',100);
            $table->string('alamat_pembeli')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('penjualan');
    }
}
