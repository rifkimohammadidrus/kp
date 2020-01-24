<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Amprahan;
use DB;

class AmprahanController extends Controller
{

     public function amprahan()
    {   
        $amprahan = Amprahan::paginate(10);
        
        return view('/perencanaan.amprahan',['amprahan'=>$amprahan]);
    }

    public function store(Request $request)
    {

    	  $this->validate($request, [
            'tanggal' => 'required',
            'rincian_anggaran' => 'required',
            'kode_akun_lengkap' => 'required',
            'jumlah' => 'required',
        ]);        
        $amprahan = Amprahan::create([
            'tanggal' => $request->tanggal,
            'rincian_anggaran' => $request->rincian_anggaran,
            'kode_akun_lengkap' => $request->kode_akun_lengkap,
            'jumlah' => $request->jumlah

        ]);
      return redirect('/amprahan')->with('success', 'Stock has been added');
    }

    public function edit($kode_akun_lengkap)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $amprahan = DB::table('amprahan')->where('kode_akun_lengkap',$kode_akun_lengkap)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('/perencanaan/edit',['amprahan' => $amprahan]);
 
    }
    
    public function update(Request $request)
    {
    // update data pegawai
    DB::table('amprahan')->where('kode_akun_lengkap',$request->kode_akun_lengkap)->update([
        'tanggal' => $request->tanggal,
        'rincian_anggaran' => $request->rincian_anggaran,
        'kode_akun_lengkap' => $request->kode_akun_lengkap,
        'jumlah' => $request->jumlah
    ]);
    // alihkan halaman ke halaman pegawai
    return redirect('/amprahan');
    }

    public function hapus($id)
    {
    // menghapus data pegawai berdasarkan id yang dipilih
    DB::table('amprahan')->where('id',$id)->delete();
        
    // alihkan halaman ke halaman pegawai
    return redirect('/amprahan')->with('success', 'Data telah dihapus');
    }   

}
