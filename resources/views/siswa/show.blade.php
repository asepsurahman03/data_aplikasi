@extends('layout/aplikasi')

@section('konten')
   <div>    
        <a href='/siswa' class="btn btn-secondary">Kembali</a>

        <div class="">
            <div class="">
                <h1>Nama Aplikasi : {{ $data->nama_apk }}</h1>
            </div>

            <div class="d-flex gap-2">
            <p class="text-start p-0 m-0 fw-bold">Nama OPD : </p>{{ $data->nama_opd }}
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Nama Aplikasi :</span>  {{ $data->nama_apk }}</p>
                <p class="text-start p-0 m-0"><span class="fw-bold">Versi :</span> {{ $data->versi }}</p >
            </div>

            <p class="text-start p-0 m-0"><span class="fw-bold">SK Walikota / Kepala Unit Kerja yang berkaitan dengan aplikasi :</span></p>
            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Nomor :</span> {{ $data->nomor_sk }}</p >
                    <p class="text-start p-0 m-0"><span class="fw-bold">Tahun :</span> {{ $data->tahun}}</p >
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Kondisi :</span> {{ $data->kondisi}}</p>
                <p class="text-start p-0 m-0"><span class="fw-bold">alasan tidak aktif:</span> {{ $data->alasan_tidak_aktif}}</p>
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Nama Admin :</span> {{ $data->nama_admin}}</p>
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Nomor WhatsApp :</span> {{ $data->nomor_wa}}</p>
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Email :</span> {{ $data->email}}</p>
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Jumlah Pengguna :</span> {{ $data->jumlah_pengguna}} OPD</p>
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Alamat Web :</span> {{ $data->alamat_web}}</p>
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Jenis Layanan :</span> {{ $data->jenis_layanan}}</p>
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Uraian Singkat Aplikasi dan Manfaatnya :</span> {{ $data->uraian}}</p>
            </div>

            <div class="d-flex gap-3 flex-column">
                <p class="text-start p-0 m-0"><span class="fw-bold">Apakah aplikasi ini memiliki dokumen Proses Bisnis atau SOP yang berkaitan ?(lampirkan
                    jika ada) : </span></p>
                <img style="max-width:100px;max-height:100px" src="{{ url('foto_sop').'/'.$data->foto_sop }}"/>
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Kepemilikan Aplikasi : </span> {{ $data->pemilik_aplikasi}}</p>
            </div>

            <div class="d-flex gap-3 flex-column">
                <p class="text-start p-0 m-0"><span class="fw-bold">Tampilan layar (screen shoot) aplikasi : (halaman awal, proses yang terjadi, contoh keluaran) :  </span>
                </p>
                <img style="max-width:100px;max-height:100px" src="{{ url('foto_layar').'/'.$data->foto_layar }}"/>
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Apakah diadakan pelatihan untuk penggunaan aplikasi ?(jika ya sebutkan tahun dan jumlah peserta) : </span> {{ $data->pelatihan}}</p>
            </div>

            <div class="d-flex gap-3 flex-column">
                <p class="text-start p-0 m-0"><span class="fw-bold">Rapat Evaluasi yang berkaitan dengan aplikasi :</span>               
                </p>
                <img style="max-width:100px;max-height:100px" src="{{ url('foto_rapat').'/'.$data->foto_rapat }}"/>
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Apakah ada pihak yang dapat dijadikan tempat konsultasi jika suatu saat terjadi error / bug? :</span> {{ $data->bug}}</p>
            </div>

            <div class="d-flex gap-3">
                <p class="text-start p-0 m-0"><span class="fw-bold">Apakah ada kendala dalam penggunaan/ pengeloaan aplikasi ? :</span> {{ $data->kendala}}</p>
            </div>
            {{-- <div class="d-flex gap-3">
                <p class="text-start p-0 m-0">Foto : </p>
                <img style="max-width:400px;max-height:400px" src="{{ url('foto').'/'.$data->foto }}"/>
            </div> --}}
        </div>
    </div>
    @endsection
            
        {{-- <p>
            <b>Nama OPD</b> {{ $data->nomor_induk}} <br>
            <b>Versi</b> {{ $data->versi}} <br> 
            <b>Nomor SK</b> {{ $data->nomor_sk}} <br>
            <b>Tahun</b> {{ $data->tahun}} <br>
            <b>Nama Admin</b> {{ $data->nama_admin}} <br> 
            <b>Nomor WhatsApp</b> {{ $data->alamat}} <br>
            <b>Email</b> {{ $data->email}} <br>
            <b>Jumlah Pengguna</b> {{ $data->jumlah_pengguna}} <br>
            <b>kondisi</b> {{ $data->kondisi}} <br>
            <b>jeins Layanan</b> {{ $data->jenis_layanan}} <br>
            <b>Foto</b>  @if ($data->foto) <br>
            <img style="max-width:400px;max-height:400px" src="{{ url('foto').'/'.$data->foto }}"/>
        @endif
        </p> --}}
