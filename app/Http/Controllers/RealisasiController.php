<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Realisasi;
use DB;

class RealisasiController extends Controller
{
     public function index()
    {	
        $realisasi = Realisasi::paginate(10);
        return view('/perencanaan/realisasi',compact('realisasi'));
    }

    public function store(Request $request)
    {

    	  $this->validate($request, [
            'tanggal' => 'required',
            'rincian_anggaran' => 'required',
            'kode_akun_lengkap' => 'required',
            'jumlah' => 'required',
        ]);        
        $realisasi = Realisasi::create([
            'tanggal' => $request->tanggal,
            'rincian_anggaran' => $request->rincian_anggaran,
            'kode_akun_lengkap' => $request->kode_akun_lengkap,
            'jumlah' => $request->jumlah

        ]);
      return redirect('/perencanaan/realisasi')->with('success', 'Stock has been added');
    }

	public function edit($kode_akun_lengkap)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$realisasi = DB::table('realisasi')->where('kode_akun_lengkap',$kode_akun_lengkap)->get();
		// passing data pegawai yang didapat ke view edit.blade.php
		return view('/perencanaan/edit_realisasi',['realisasi' => $realisasi]);
 
	}
	
	public function update(Request $request)
	{
	// update data pegawai
	DB::table('realisasi')->where('kode_akun_lengkap',$request->kode_akun_lengkap)->update([
		'tanggal' => $request->tanggal,
        'rincian_anggaran' => $request->rincian_anggaran,
        'kode_akun_lengkap' => $request->kode_akun_lengkap,
        'jumlah' => $request->jumlah
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/perencanaan/realisasi');
	}

	public function hapus($id)
	{
    // menghapus data pegawai berdasarkan id yang dipilih
    DB::table('realisasi')->where('id',$id)->delete();
        
    // alihkan halaman ke halaman pegawaiasasas
    return redirect('/perencanaan/realisasi')->with('success', 'Data telah dihapus');
	}	

}
