<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\Comparator\NumericComparator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::orderBy('nama_apk', 'desc')->paginate(5);
        return view('siswa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa/create');
    }

//     public function upload(Request $request) {
//     $files = $request->file('foto_sop');

//     foreach ($files as $file) {
//         $filename = $file->store('uploads');

//         $fileModel = new File();
//         $fileModel->name = $file->getClientOriginalName();
//         $fileModel->file_type = $file->getMimeType();
//         $fileModel->file_path = $filename;
//         $fileModel->save();
//     }

//     return redirect()->back()->with('success', 'Files uploaded successfully!');
// }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_opd', $request->nama_opd);
        Session::flash('nama_apk', $request->nama_apk);
        Session::flash('nama_admin', $request->nama_admin);
        Session::flash('tahun', $request->tahun);
        Session::flash('nomor_sk', $request->nomor_sk);
        Session::flash('versi', $request->jumlah_pengguna);
        Session::flash('nomor_wa', $request->nomor_wa);
        // Session::flash('kondisi', $request->kondisi);
        Session::flash('jenis_layanan', $request->jenis_layanan);
        Session::flash('pemilik_akun', $request->pemilik_akun);
        Session::flash('bug', $request->bug);
        // Session::flash('uraian', $request->uraian);
        // Session::flash('alasan_tidak_aktif', $request->alasan_tidak_aktif);
        Session::flash('pelatihan', $request->pelatihan);
        Session::flash('alamat_web', $request->alamat_web);
        // Session::flash('kendala', $request->kendala);

        $request->validate([
            'nama_opd' => 'required',
            'nama_apk' => 'required',
            'tahun' => 'required|numeric',
            'versi' => 'required|numeric',
            'email' => 'required',
            'nama_admin' => 'required',
            'jumlah_pengguna' => 'required',
            'nomor_sk' => 'required',
            'nomor_wa' => 'required|numeric',
            'kondisi' => 'required',
            'jenis_layanan' => 'required',
            // 'foto' => 'required|mimes:jpeg,jpg,png,gif',
            // 'foto_sop' => 'mimes:jpeg,jpg,png,gif',
            'foto_layar' => 'mimes:jpeg,jpg,png,gif',
            'foto_rapat' => 'mimes:jpeg,jpg,png,gif'
        ], [
            'nama_opd.required' => 'Nama OPD wajib diisi',
            // 'nama_opd.numeric' => 'Nama OPD wajib diisi dalam angka',
            'nama_apk.required' => 'Nama Aplikasi wajib diisi',
            'tahun.required' => 'tahun wajib diisi',
            'versi.required' => 'versi wajib diisi',
            'nomor_sk.required' => 'nomor sk wajib diisi',
            'email.required' => 'email wajib diisi',
            'nama_admin.required' => 'Nama admin wajib diisi',
            'jumlah_pengguna.required' => 'jumlah pengguna wajib diisi',
            'nomor_wa.required' => 'nomor_wa wajib diisi',
            // 'foto.required' => 'Silakan masukkan foto',  
        ]);
        

        // $foto_file = $request->file('foto');
        // $foto_ekstensi = $foto_file->extension();
        // $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        // $foto_file->move(public_path('foto_sop'), $foto_nama);

        // $foto_file2 = $request->file('foto_sop',);
        // $foto_ekstensi2 = $foto_file2->extension();
        // $foto_sop = date('ymdhis') . "." . $foto_ekstensi2;
        // $foto_file2->move(public_path('foto_sop'), $foto_sop);

        $foto_file3 = $request->file('foto_layar',);
        $foto_ekstensi3 = $foto_file3->extension();
        $foto_layar = date('ymdhis') . "." . $foto_ekstensi3;
        $foto_file3->move(public_path('foto_layar'), $foto_layar);

        $foto_file4 = $request->file('foto_rapat',);
        $foto_ekstensi4 = $foto_file4->extension();
        $foto_rapat = date('ymdhis') . "." . $foto_ekstensi4;
        $foto_file4->move(public_path('foto_rapat'), $foto_rapat);

        // if ($request->hasfile('foto_sop','foto_layar','foto_rapat')) { 
        //     $data = [];
        //     foreach ($request->file('foto_sop','foto_layar','foto_rapat') as $file) {
        //         if ($file->isValid()) {
        //             $foto_sop = round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
        //             $foto_rapat= round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
        //             $foto_layar = round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
        //             $file->move(public_path('images'), $foto_sop);                    
        //             $file->move(public_path('images'), $foto_layar);                    
        //             $file->move(public_path('images'), $foto_rapat);                    
        //             $data[] = [
        //                 'foto_sop' => $foto_sop,
        //                 'foto_layar' => $foto_layar,
        //                 'foto_rapat' => $foto_rapat,
        //             ];
        //         }
        //     }
        //     Siswa::insert($data);            
        //     echo'Success';
        // }else{
        //     echo'Gagal';
        // }

        $siswa = [];
        if ($request->file('siswa')){
            foreach($request->file('siswa') as $key => $file)
            {
                $fileName = time().rand(1,99).'.'.$file->extension();  
                $file->move(public_path('uploads'), $fileName);
                $siswa[]['foto_sop'] = $fileName;
            }
        }
  
        foreach ($siswa as $key => $file) {
            Siswa::create($file);
        }
     
        return back()
                ->with('success','You have successfully upload file.');

        // // Session::flash('foto', $foto_nama);
        // Session::flash('foto_layar', $foto_layar);
        // Session::flash('foto_sop', $foto_sop);
        // Session::flash('foto_rapat', $foto_rapat);

        $data = [
            'nama_opd' => $request->input('nama_opd'),
            'nama_apk' => $request->input('nama_apk'),
            'tahun' => $request->input('tahun'),
            'versi' => $request->input('versi'),
            'nomor_sk' => $request->input('nomor_sk'),
            'nama_admin' => $request->input('nama_admin'),
            'email' => $request->input('email'),
            'jumlah_pengguna' => $request->input('jumlah_pengguna'),
            'nomor_wa' => $request->input('nomor_wa'),
            'jenis_layanan' => $request->input('jenis_layanan'),
            'pemilik_aplikasi' => $request->input('pemilik_aplikasi'),
            'bug' => $request->input('bug'),
            'uraian' => $request->input('uraian'),
            'alasan_tidak_aktif' => $request->input('alasan_tidak_aktif'),
            'kondisi' => $request->input('kondisi'),
            'pelatihan' => $request->input('pelatihan'),
            'alamat_web' => $request->input('alamat_web'),
            'kendala' => $request->input('kendala'),
            // 'foto' => $foto_nama,
            // 'foto_sop' => $foto_sop,
            'foto_rapat' => $foto_rapat,
            'foto_layar' => $foto_layar,
        ];
        siswa::create($data);
        return redirect('siswa')->with('success', 'Berhasil memasukkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = siswa::where('nama_opd', $id)->first();
        return view('siswa/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = siswa::where('nama_opd', $id)->first();
        return view('siswa/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // $data = siswa::find($id);
        // $data->fill($request->except('kondisi')); // Menyimpan semua nilai kecuali 'kondisi'
        // $data->save();
        $request->validate([
            // 'nama_opd' => 'required',
            'nama_apk' => 'required',
            'versi' => 'required',
            'nomor_sk' => 'required',
            // 'nomor' => 'required',
            'tahun' => 'required',
            // 'kondisi' => 'required',
            'nama_admin' => 'required',
            'nomor_wa' => 'required',
            'email' => 'required',
            'jumlah_pengguna' => 'required',
            'alamat_web' => 'required',
            'jenis_layanan' => 'required',
            // 'uraian' => 'required',
            // 'foto_sop' => 'required',
            'pemilik_aplikasi' => 'required',
            // 'foto_layar' => 'required',
            'pelatihan' => 'required',
            // 'foto_rapat' => 'required',
            'bug' => 'required',
            // 'kendala' => 'required',
            // 'foto' => 'required',


        ], [
            // 'nama_opd' => 'Nama OPD wajib diisi',
            'nama_apk' => 'Nama Aplikasi wajib diisi',
            'versi' => 'Versi wajib diisi',
            'nomor_sk' => 'Nomor SK wajib diisi',
            'nomor' => 'Tahun wajib diisi',
            'tahun' => 'Tahun wajib diisi',
            'kondisi' => 'Kondisi wajib diisi',
            'nama_admin' => 'Nama admin wajib diisi',
            'nomor_wa' => 'Nomor WhatsApp wajib diisi',
            'email' => 'Email wajib diisi',
            'jumlah_pengguna' => 'Jumlah Pengguna wajib diisi',
            'alamat_web' => 'Alamat Web wajib diisi',
            'jenis_layanan' => 'Jenis Layanan wajib diisi',
            'uraian' => 'Uraian wajib diisi',
            'foto_sop' => 'Foto SOP wajib diisi',
            'pemilik_aplikasi' => 'Kepemilikan Aplikasi wajib diisi',
            'foto_layar' => 'Tampilan Layar wajib diisi',
            'pelatihan' => 'Pelatihan wajib diisi',
            'foto_rapat' => 'Foto Rapat wajib diisi',
            'bug' => 'Bug wajib diisi',
            'kendala' => 'Kendala wajib diisi',
            // 'foto' => 'required',



            // 'nama_opd.numeric' => 'Nama OPD wajib diisi dalam angka',
            'nama_apk.required' => 'Nama Aplikasi wajib diisi',
            'versi.required' => 'Versi wajib diisi',
            'nomor_sk.required' => 'Nomor sk wajib diisi',
            'nomor.required' => 'Nomor wajib diisi',
            'tahun.required' => 'Tahun wajib diisi',
            'kondisi' => 'Kondisi wajib diisi',
            'nama_admin.required' => 'Nama Admin wajib diisi',
            'nomor_wa.required' => 'Nomor WhatsApp wajib diisi',
            'email.required' => 'Email wajib diisi',
            'jumlah_pengguna.required' => 'Jumlah Pengguna wajib diisi',
            'alamat_web.required' => 'Alamat Web wajib diisi',
            'jenis_layanan.required' => 'Jenis Layanan wajib diisi',
            'uraian.required' => 'Uraian Singkat dan Manfaat wajib diisi',
            // 'foto_sop.required' => 'Foto SOP wajib diisi',
            'pemilik_aplikasi.required' => 'Kepemilikan Aplikasi wajib diisi',
            // 'foto_layar.required' => 'Tampilan Layar wajib diisi',
            'pelatihan.required' => 'Pelatihan wajib diisi',
            // 'foto_rapat.required' => 'Foto Rapat wajib diisi',
            'bug.required' => 'Bug wajib diisi',
            'kendala.required' => 'Kendala wajib diisi',
            // 'foto.required' => 'Foto wajib diisi',


            // 'nama_opd.numeric' => 
            // 'nama_apk.required' => 'Nama Aplikasi wajib diisi',
            // 'nama_admin.required' => 'Nama Admin wajib diisi',
            // 'nomor_sk.required' => 'Nomor sk wajib diisi',
            // 'tahun.required' => 'tahun wajib diisi',
            // 'versi.required' => 'versi wajib diisi',
            // 'jumlah_pengguna.required' => 'jumlah pengguna wajib diisi',
            // 'email.required' => 'email wajib diisi',
            // 'nomor_wa.required' => 'nomor_wa wajib diisi',
        ]);

        $data = [
            'nama_opd' => $request->input('nama_apk'),
            'nama_apk' => $request->input('nama_apk'),
            'versi' => $request->input('versi'),
            'nomor_sk' => $request->input('nomor_sk'),
            // 'nomor' => $request->input('nomor'),
            'tahun' => $request->input('tahun'),
            'kondisi' => $request->input('kondisi',null),
            'nama_admin' => $request->input('nama_admin'),
            'nomor_wa' => $request->input('nomor_wa'),
            'email' => $request->input('email'),
            'jumlah_pengguna' => $request->input('jumlah_pengguna'),
            'alamat_web' => $request->input('alamat_web',null),
            'jenis_layanan' => $request->input('jenis_layanan'),
            'uraian' => $request->input('uraian'),
            // 'foto_sop' => $request->input('foto_sop',null),
            'pemilik_aplikasi' => $request->input('pemilik_aplikasi'),
            'alasan_tidak_aktif' => $request->input('alasan_tidak_aktif'),
            // 'foto_layar' => $request->input('foto_layar',null),
            'pelatihan' => $request->input('pelatihan'),
            // 'foto_rapat' => $request->input('foto_rapat',null),
            'bug' => $request->input('bug'),
            'kendala' => $request->input('kendala',null),
            // 'foto' => $request->input('foto'),


            // 'nama_apk' => $request->input('nama_apk'),
            // 'nama_admin' => $request->input('nama_admin'),
            // 'nomor_sk' => $request->input('nomor_sk'),
            // 'tahun' => $request->input('tahun'),
            // 'versi' => $request->input('versi'),
            // 'email' => $request->input('email'),
            // 'jumlah_pengguna' => $request->input('jumlah_pengguna'),
            // 'nomor_wa' => $request->input('nomor_wa'),
            // 'jenis_layanan' => $request->input('jenis_layanan'),
            // 'kondisi' => $request->input('kondisi'),
        ];

        if ($request->hasfile('foto_sop')) { 
            $data = [];
            foreach ($request->file('foto_sop') as $file) {
                if ($file->isValid()) {
                    $foto_sop = round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
                    $file->move(public_path('images'), $foto_sop);                    
                    $data[] = [
                        'foto_sop' => $foto_sop,
                    ];
                }
            }
            Siswa::insert($data);            
            echo'Success';
        }else{
            echo'Gagal';
        }

        if ($request->hasFile('foto_layar','foto_sop','foto_rapat')) {
            $request->validate([
                // 'foto' => 'mimes:jpeg,jpg,png,gif',
                'foto_layar' => 'mimes:jpeg,jpg,png,gif',
                'foto_rapat' => 'mimes:jpeg,jpg,png,gif',
                'foto_sop' => 'mimes:jpeg,jpg,png,gif',
            ], [
                // 'foto.mimes' => 'Foto hanya diperbolehkan berekstensi JPEG, JPG, PNG, dan GIF',
                'foto_layar.mimes' => 'Foto hanya diperbolehkan berekstensi JPEG, JPG, PNG, dan GIF',
                'foto_rapat.mimes' => 'Foto hanya diperbolehkan berekstensi JPEG, JPG, PNG, dan GIF',
                'foto_sop.mimes' => 'Foto hanya diperbolehkan berekstensi JPEG, JPG, PNG, dan GIF',
            ]);
            // $foto_file = $request->file('foto');
            // $foto_ekstensi = $foto_file->extension();
            // $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            // $foto_file->move(public_path('foto_sop'), $foto_nama);
    
            $foto_file2 = $request->file('foto_sop',);
            $foto_ekstensi2 = $foto_file2->extension();
            $foto_sop = date('ymdhis') . "." . $foto_ekstensi2;
            $foto_file2->move(public_path('foto_sop'), $foto_sop);
    
            $foto_file3 = $request->file('foto_layar',);
            $foto_ekstensi3 = $foto_file3->extension();
            $foto_layar = date('ymdhis') . "." . $foto_ekstensi3;
            $foto_file3->move(public_path('foto_layar'), $foto_layar);
    
            $foto_file4 = $request->file('foto_rapat',);
            $foto_ekstensi4 = $foto_file4->extension();
            $foto_rapat = date('ymdhis') . "." . $foto_ekstensi4;
            $foto_file4->move(public_path('foto_rapat'), $foto_rapat); //sudah terupload ke direktori

            $data_foto = siswa::where('nama_opd', $id)->first();
            File::delete(public_path('foto') . '/' . $data_foto->foto);
            File::delete(public_path('foto_layar') . '/' . $data_foto->foto_layar);
            File::delete(public_path('foto_sop') . '/' . $data_foto->foto_sop);
            File::delete(public_path('foto_rapat') . '/' . $data_foto->foto_rapat);

            // $data = [
            //     'foto' => $foto_nama
            // ];
            // $data['foto'] = $foto_nama;
            $data['foto_layar'] = $foto_layar;
            $data['foto_sop'] = $foto_sop;
            $data['foto_rapat'] = $foto_rapat;
        }

        siswa::where('nama_opd', $id)->update($data);
        return redirect('/siswa')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = siswa::where('nama_opd', $id)->first();
        // File::delete(public_path('foto') . '/' . $data->foto);
        File::delete(public_path('foto_layar') . '/' . $data->foto_layar);
        File::delete(public_path('foto_sop') . '/' . $data->foto_sop);
        File::delete(public_path('foto_rapat') . '/' . $data->foto_rapat);

        siswa::where('nama_opd', $id)->delete();
        return redirect('/siswa')->with('success', 'Berhasil hapus data');
    }

    public function uploadFiles(Request $request)
    {
        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $file) {
                if ($file->isValid()) {
                    // Mendapatkan nama file
                    $fileName = $file->getClientOriginalName();

                    // Menyimpan file ke direktori tertentu
                    $file->storeAs('uploads', $fileName);
                }
            }

            return redirect()->back()->with('success', 'File berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Tidak ada file yang diunggah.');
    }
}