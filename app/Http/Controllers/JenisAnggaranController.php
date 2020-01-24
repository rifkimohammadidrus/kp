<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\JenisAnggaran;
use App\RincianAnggaran;
class JenisAnggaranController extends Controller
{
    /* public function jenisanggaran(){
    return $jenisanggaran = DB::table('jenis_anggarans')
            ->join('rincian_anggarans', 'jenis_anggarans.id', '=', 'rincian_anggarans.id')
            ->select('jenis_anggarans.*', 'rincian_anggarans.kode_sub', 'rincian_anggarans.rincian_anggaran')
            ->get();
    } */

    
    public function create()
    {
        $data = JenisAnggaran::all();
        return view('create_rincian',compact('data'));
    }
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'kode_induk'=>'required',
            'jenis_anggaran'=>'required'
        ]);
        $data = JenisAnggaran::create([
            'kode_induk' => $request->kode_induk,
            'jenis_anggaran' => $request->jenis_anggaran
            
        ]);
        
        return redirect('create_rincian');
    }
    /* public function store1(Request $request)
    {
        
        $this->validate($request, [
            'jenis_anggaran_id'=> 'required',
            'kode_sub' => 'required',
            'rincian_anggaran' => 'required'
        ]);
        
        $data=RincianAnggaran::create([
            'jenis_anggaran_id' =>$request->jenis_anggaran_id,
            'kode_sub' => $request->kode_sub,
            'rincian_anggaran' => $request->rincian_anggaran
        ]);
        return redirect('create_rincian');
    }  */

}
