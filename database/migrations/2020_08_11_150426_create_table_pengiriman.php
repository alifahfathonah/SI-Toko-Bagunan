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
            $table->foreignID('driver_id')->nullable();
            $table->date('tanggal_pengiriman');
            $table->string('nama_pembeli', 100);
            $table->string('alamat_pembeli')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('grandtotal', 25, 2)->default(0.00);
            $table->string('uk_kendaraan', 20)->nullable();
            $table->string('status', 20);
            $table->string('prioritas', 20);
            $table->dateTime('send_at')->nullable();
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
