<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            // $table->id();
            $table->timestamps();
            $table->string('nama_opd');
            $table->string('nama_apk');
            $table->integer('versi');
            $table->integer('nomor_sk');
            $table->string('tahun');
            $table->string('kondisi');
            $table->string('nama_admin');
            $table->text('nomor_wa');
            $table->string('email');
            $table->string('jumlah_pengguna');
            $table->string('alamat_web')->nullable();
            $table->string('jenis_layanan');
            $table->string('uraian')->nullable();
            $table->string('pemilik_aplikasi');
            $table->string('alasan_tidak_aktif')->nullable();
            $table->string('pelatihan');
            $table->string('kendala')->nullable();
            $table->string('bug');
            $table->unique(array('nomor_sk'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};