<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdKendaraanAtTablePengiriman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengiriman', function (Blueprint $table) {
            $table->integer('kendaraan_id')->after('uk_kendaraan')->nullable();
            $table->boolean('has_paid_driver')->after('send_at')->nullable();
            $table->integer('salary_id')->after('has_paid_driver')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengiriman', function (Blueprint $table) {
            $table->dropColumn('kendaraan_id');
            $table->dropColumn('has_paid_driver');
            $table->dropColumn('salary_id');

        });
    }
}
