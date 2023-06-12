<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = "siswa";
    protected $fillable = ['nama_opd', 'nama_apk', 'nomor_wa','nama_admin','email','tahun','versi','nomor_sk','jumlah_pengguna','kondisi','jenis_layanan','alamat_web','foto_sop','foto_layar','foto_rapat','pemilik_aplikasi','bug','uraian','alasan_tidak_aktif','pelatihan','kendala'];
}