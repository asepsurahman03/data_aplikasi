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
            $table->id();
            $table->timestamps();
            $table->string('nama_opd');
            $table->string('nama_apk');
            $table->integer('versi')->nullable();
            $table->text('nomor_sk');
            $table->integer('tahun');
            $table->string('kondisi')->nullable();
            $table->string('nama_admin');
            $table->string('nomor_wa');
            $table->string('email');
            $table->string('jumlah_pengguna');
            $table->string('alamat_web');
            $table->string('jenis_layanan');
            $table->text('uraian')->nullable();
            $table->string('pemilik_aplikasi');
            $table->text('alasan_tidak_aktif')->nullable();
            $table->string('pelatihan')->nullable();
            $table->string('kendala')->nullable();
            $table->string('bug')->nullable();
            // $table->unique(array('nomor_sk'));
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