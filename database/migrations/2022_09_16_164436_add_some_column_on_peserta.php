<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnOnPeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->unsignedBigInteger('bidang_keahlian_id');
            $table->foreign('bidang_keahlian_id')->references('id')->on('bidang_keahlians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->dropForeign(['bidang_keahlian_id']);
            $table->dropColumn('bidang_keahlian_id');
        });
    }
}
