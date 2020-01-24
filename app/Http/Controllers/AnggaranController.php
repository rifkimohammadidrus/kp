<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggaran;
use DB;

class AnggaranController extends Controller
{
    public function anggaran()
    {
        $anggaran = Anggaran::paginate(10);

        return view('anggaran.anggaran', ['anggaran'=>$anggaran]);
    }
    public function saveAnggaran(Request $request)
    {
        $this->validate($request, [
            'tahun_akademik' => 'required',
            'kode_akun' => 'required',
            'jenis_anggaran' => 'required',
            'sub_kode_akun' => 'required',
            'rincian_anggaran' => 'required'
        ]); 
        
        $kode_akun_lengkap = $request->kode_akun;
        $kode_akun_lengkap .= $request->sub_kode_akun;

        $anggaran = Anggaran::create([
            'tahun_akademik' => $request->tahun_akademik,
            'kode_akun' => $request->kode_akun,
            'jenis_anggaran' => $request->jenis_anggaran,
            'sub_kode_akun' => $request->sub_kode_akun,
            'rincian_anggaran' => $request->rincian_anggaran,
            'kode_akun_lengkap' => $kode_akun_lengkap
        ]);
        return redirect('/anggaran');


        // $lengkap = $akun;
        // $lengkap .= $sub;
    }
    public function cariAnggaran(Request $request)
    {
        $cari = $request->cari;

        $anggaran = Anggaran::where('tahun_akademik', 'like', "%".$cari. "%")
        ->orwhere('kode_akun', 'like', "%".$cari. "%")->orWhere('jenis_anggaran', 'like', "%".$cari. "%")
        ->orWhere('sub_kode_akun', 'like', "%".$cari. "%")->orWhere('rincian_anggaran', 'like', "%".$cari. "%")
        ->orWhere('kode_akun_lengkap', 'like', "%".$cari. "%")->paginate(10);

        return view('anggaran.anggaran', ['anggaran'=>$anggaran]);
    }

    public function ubah(Request $request)
    {
        
        // mengambil data pegawai berdasarkan id yang dipilih
        $anggaran = DB::table('anggarans')->where('kode_akun_lengkap', $request->kode_akun_lengkap)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('anggaran.ubah',['anggaran' => $anggaran]);
 
    }
    
    public function ganti(Request $request)
    {
    // update data
    $kode_akun_lengkap = $request->kode_akun;
    $kode_akun_lengkap .= $request->sub_kode_akun;
    
    DB::table('anggarans')->where('kode_akun_lengkap', $request->kode_akun_lengkap)->update([
        'tahun_akademik' => $request->tahun_akademik,
        'kode_akun' => $request->kode_akun,
        'jenis_anggaran' => $request->jenis_anggaran,
        'sub_kode_akun' => $request->sub_kode_akun,
        'rincian_anggaran' => $request->rincian_anggaran,
        'kode_akun_lengkap' => $kode_akun_lengkap
    ]);

    
    // alihkan halaman ke halaman pegawai
    return redirect('/anggaran');
    }

    public function delete($id)
    {
    // menghapus data pegawai berdasarkan id yang dipilih
    DB::table('anggarans')->where('id',$id)->delete();
        
    // alihkan halaman ke halaman pegawai
    return redirect('/anggaran')->with('success', 'Data telah dihapus');
    }
}
