<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip');
            $table->string('email');
            $table->unsignedBigInteger('jabatan_id');
            $table->unsignedBigInteger('golongan_id');
            $table->unsignedBigInteger('unit_kerja_id');
            $table->string('pendidikan_terakhir');
            $table->string('bidang_keahlian');
            $table->string('kemampuan_peran');
            $table->string('kemampuan_slide');
            $table->string('sertifikat_bidang')->nullable();
            $table->string('sertifikat_kompetensi')->nullable();
            $table->string('sertifikat_pendukung')->nullable();
            $table->string('tanda_tangan');
            $table->integer('status');
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade');
            $table->foreign('golongan_id')->references('id')->on('golongans')->onDelete('cascade');
            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerjas')->onDelete('cascade');
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
        Schema::dropIfExists('pendaftars');
    }
}
