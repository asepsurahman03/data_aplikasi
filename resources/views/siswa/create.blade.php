@extends('layout/aplikasi')

@section('konten')
    <form method="post" action="/siswa" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="nama_opd" class="form-label">Nama OPD</label>
            <input type="text" class="form-control" name='nama_opd' id="nama_opd" value="{{ Session::get('nama_opd')}}">
        </div>
        
        <div class="mb-3 d-flex gap-3">
            <div class="w-100"><label for="nama_apk" class="form-label">Nama Aplikasi</label>
                <input type="text" class="form-control" name='nama_apk' id="nama_apk" value="{{ Session::get('nama_apk')}}">
            </div>
            <div class="w-100">
                <label for="versi" class="form-label">Versi</label>
            <input type="number" class="form-control" name='versi' id="versi" value="{{ Session::get('versi')}}">
            </div>
         </div>
        
         <div class="mb-3">
            <label for="SK">SK Walikota / Kepala Unit Kerja yang berkaitan dengan aplikasi</label>
            <div class="d-flex gap-3">
            <div class="w-100">
                <label for="nomor_sk" class="form-label">Nomor :</label>
                <input type="text" class="form-control" name="nomor_sk">{{ Session::get('nomor_sk')}}
            </div>
            <div class="w-100">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="text" class="form-control" name="tahun">{{ Session::get('tahun')}}</div>
            </div>
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <div class="d-flex gap-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="kondisi" id="aktif" value="Aktif" > 
                <label class="form-check-label" for="aktif">
                  Aktif
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="kondisi" id="tidak" value="Tidak Aktif">
                <label class="form-check-label" for="tidak">
                  Tidak Aktif
                </label>
              </div>
              
            </div>
            <textarea class="form-control mt-3" name="alasan_tidak_aktif" id="alasan_tidak_aktif" cols="30" rows="2" placeholder="alasan tidak aktif" value="{{ Session::get("alasan_tidak_aktif") }}"></textarea>
        </div>

        <div class="mb-3">
            <label for="nama_admin" class="form-label">Nama Admin</label>
            <input type="text" class="form-control" name='nama_admin' id="nama_admin" value="{{ Session::get('nama_admin')}}">
        </div>
       
        <div class="mb-3">
            <label for="nomor_wa" class="form-label">Nomor WA</label>
            <input type="text" class="form-control" name='nomor_wa' id="nomor_wa" value="{{ Session::get('nomor_wa')}}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name='email' id="email" value="{{ Session::get('email')}}">
        </div>

        <div class="mb-3">
            <label for="jumlah_pengguna" class="form-label">Jumlah Pengguna</label>
            <input type="text" class="form-control" name='jumlah_pengguna' id="jumlah_pengguna" value="{{ Session::get('jumlah_pengguna')}}">
        </div>

        <div class="mb-3">
            <label for="alamat_web" class="form-label">Alamat Web</label>
            <input type="text" class="form-control" name='alamat_web' id="alamat_web" value="{{ Session::get('alamat_web')}}">
        </div>

        <div class="mb-3 d-flex flex-column">
            <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
            <select name="jenis_layanan" class="form-select">
                <option value="Untuk Pemerintahan(G2G)">Untuk Pemerintahan(G2G)</option>
                <option value="Untuk Pelaku Usaha(G2B)">Untuk Pelaku Usaha(G2B)</option>
                <option value="Untuk Masyarakat Umum (G2C)">Untuk Masyarakat Umum (G2C)</option>
                <option value="Untuk Pegawai ASN dan Non ASN (G2E)">Untuk Pegawai ASN dan Non ASN (G2E)</option>
            </select>
        </div>

        <div class="mb-3 d-flex flex-column">
            <label for="uraian" class="form-label">Uraian Singkat Aplikasi dan Manfaatnya :</label>
            <textarea name="uraian" id="uraian" cols="10" rows="4" value="uraian"></textarea>
        </div>

        <div class="mb-3">
            <label for="sop" class="form-label">Apakah aplikasi ini memiliki dokumen Proses Bisnis atau SOP yang berkaitan ?(lampirkan
                jika ada)</label>
            <input type="file" class="form-control" name="foto_sop[]" id="foto_sop" multiple="true">
        </div>

        <div class="mb-3 d-flex flex-column">
            <label for="pemilik_aplikasi" class="form-label">Kepemilikan Aplikasi</label>
            <select name="pemilik_aplikasi" class="form-select">
                <option value="Pusat">Pusat</option>
                <option value="Provinsi">Provinsi</option>
                <option value="Kota">Kota</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="layar" class="form-label">Tampilan layar (screen shoot) aplikasi : (halaman awal, proses yang terjadi, contoh keluaran)</label>
            <input type="file" class="form-control" name="foto_layar" id="foto_layar">
        </div>
        
        <div class="mb-3">
            <label for="pelatihan" class="form-label">Apakah diadakan pelatihan untuk penggunaan aplikasi ?(jika ya sebutkan tahun dan jumlah
                peserta)</label>
            <input type="text" class="form-control" name='pelatihan' id="pelatihan" value="{{ Session::get('pelatihan')}}">
        </div>

        <div class="mb-3">
            <label for="rapat" class="form-label">Rapat Evaluasi yang berkaitan dengan aplikasi: (Foto rapat, notulen, daftar hadir)</label>
            <input type="file" class="form-control" name="foto_rapat" id="foto_rapat">
        </div>

        <div class="mb-3">
            <label for="bug" class="form-label">Apakah ada pihak yang dapat dijadikan tempat konsultasi jika suatu saat terjadi error / bug?</label>
            <input type="text" class="form-control" name='bug' id="bug" value="{{ Session::get('bug')}}">
        </div>

        <div class="mb-3 d-flex flex-column">
            <label for="kendala" class="form-label">Apakah ada kendala dalam penggunaan/ pengeloaan aplikasi ?</label>
            <textarea name="kendala" id="kendala" cols="10" rows="4" value="{{ Session::get('kendala')}}"></textarea>
        </div>

        {{-- <div class="mb-3">
            <label for="foto" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div> --}}
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </form>
@endsection