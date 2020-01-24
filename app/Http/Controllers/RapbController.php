<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Rapb;
use App\RincianAnggaran;
use App\JenisAnggaran;

class RapbController extends Controller
{
    
    public function rapb()
    {
        $rapb = Rapb::paginate(10);

        return view('rapb.rapb', ['rapb'=>$rapb]);
    }
    public function saveRapb(Request $request)
    {
        $this->validate($request, [
            'kode_akun_rapb' => 'required',
            'sub_kode_rapb' => 'required',
            'tahun_akademik' => 'required',
            'semester' => 'required',
            'jumlah_mahasiswa' => 'required',
            'jumlah_sks' => 'required',
            'besarnya' => 'required'
        ]);
        
        $kode_akun_lengkap_rapb = $request->kode_akun_rapb;
        $kode_akun_lengkap_rapb .= $request->sub_kode_rapb;
        $jumlah_100 = $request->besarnya * $request->jumlah_mahasiswa;
        $jumlah_90 = 0.9 * $jumlah_100;
        $rapb = Rapb::create([
            'kode_akun_rapb' => $request->kode_akun_rapb,
            'kategori_rapb' => $request->kategori_rapb,
            'sub_kode_rapb' => $request->sub_kode_rapb,
            'tahun_akademik' => $request->tahun_akademik,
            'semester' => $request->semester,
            'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
            'jumlah_sks' => $request->jumlah_sks,
            'besarnya' => $request->besarnya,
            'kode_akun_lengkap_rapb' => $kode_akun_lengkap_rapb,
            'jumlah_100' => $jumlah_100,
            'jumlah_90' => $jumlah_90
        ]);
        return redirect('/rapb');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
 
        // mengambil data dari table  sesuai pencarian data
        $rapb = Rapb::where('sub_kode_rapb', 'like',"%".$cari."%")->orwhere('kode_akun_rapb', 'like',"%".$cari."%")->orwhere('kategori_rapb', 'like',"%".$cari."%")->orWhere('semester', 'like',"%".$cari."%")
        ->orWhere('jumlah_mahasiswa', 'like',"%".$cari."%")->orWhere('jumlah_sks', 'like',"%".$cari."%")
        ->orWhere('besarnya', 'like',"%".$cari."%")->orWhere('jumlah_100', 'like',"%".$cari."%")
        ->orWhere('jumlah_90', 'like',"%".$cari."%")->orWhere('tahun_akademik', 'like',"%".$cari."%")->orWhere('kode_akun_lengkap_rapb', 'like',"%".$cari."%")->paginate(10);
 
    	// mengirim data  ke view index
        return view('rapb.rapb', ['rapb'=>$rapb]);
 
	}

    // //Transitoris
    // public function danaBangunan()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "DANA BANGUNAN")->paginate(10);

    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }
    // public function biayaTetap()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "BIAYA TETAP")->paginate(10);

    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }
    // public function biayaSKS()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "BIAYA SKS")->paginate(10);
    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }
    // public function biayaPraktikum()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "BIAYA PRAKTIKUM")->paginate(10);
    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }

    // //Non-Transitoris
    // public function registrasi()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "REGISTRASI")->paginate(10);
    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }
    // public function perpustakaan()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "PERPUSTAKAAN")->paginate(10);

    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }
    // public function kemahasiswaan()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "KEMAHASISWAAN")->paginate(10);
    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }
    // public function kerjaPraktek()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "KERJA PRAKTEK")->paginate(10);

    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }
    // public function tugasAkhir()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "TUGAS AKHIR")->paginate(10);

    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }
    // public function biayaPBMA()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "BIAYA PBMA")->paginate(10);

    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }
    // public function biayaUTS()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "BIAYA UTS")->paginate(10);

    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }
    // public function biayaUAS()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "BIAYA UAS")->paginate(10);

    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }
    // public function biayaWisuda()
    // {
    //     $rapb = Rapb::where('kategori_rapb', '=', "BIAYA WISUDA")->paginate(10);

    //     return view('rapb.rapb', ['rapb'=>$rapb]);
    // }

    public function editRapb($kode_akun_lengkap_rapb)
    {
        
        // mengambil data pegawai berdasarkan id_rapb yang dipilih
        $rapb = DB::table('rapb')->where('kode_akun_lengkap_rapb',$kode_akun_lengkap_rapb)->get();
        // passing data pegawai yang did_rapbapat ke view edit.blade.php
        return view('rapb.editRapb',['rapb' => $rapb]);
 
    }
    
    public function updateRapb(Request $request)
    {
    // update data
    $kode_akun_lengkap_rapb = $request->kode_akun_rapb;
    $kode_akun_lengkap_rapb .= $request->sub_kode_rapb;
    $jumlah_100 = $request->besarnya * $request->jumlah_mahasiswa;
    $jumlah_90 = 0.9 * $jumlah_100;
    
    DB::table('rapb')->where('kode_akun_lengkap_rapb', $request->kode_akun_lengkap_rapb)->update([
        'kode_akun_rapb' => $request->kode_akun_rapb,
        'kategori_rapb' => $request->kategori_rapb,
        'sub_kode_rapb' => $request->sub_kode_rapb,
        'tahun_akademik' => $request->tahun_akademik,
        'semester' => $request->semester,
        'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
        'jumlah_sks' => $request->jumlah_sks,
        'besarnya' => $request->besarnya,
        'kode_akun_lengkap_rapb' => $kode_akun_lengkap_rapb,
        'jumlah_100' => $jumlah_100,
        'jumlah_90' => $jumlah_90
    ]);
    
    // alihkan halaman ke halaman pegawai
    return redirect('/rapb');
    }

    public function deleteRapb($id_rapb)
    {
    // menghapus data pegawai berdasarkan id_rapb yang dipilih
    DB::table('rapb')->where('id_rapb',$id_rapb)->delete();
        
    // alihkan halaman ke halaman pegawai
    return redirect('/rapb')->with('success', 'Data telah dihapus');
    }


} 