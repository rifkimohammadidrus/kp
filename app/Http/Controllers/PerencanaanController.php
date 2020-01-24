<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perencanaan;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class PerencanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function cari(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
 
        // mengambil data dari table sesuai pencarian data
        $data = Perencanaan::where('id', 'like',"%".$cari."%")->orWhere('deskripsi', 'like',"%".$cari."%")
        ->orWhere('kode', 'like',"%".$cari."%")->orWhere('debit', 'like',"%".$cari."%")
        ->orWhere('kredit', 'like',"%".$cari."%")->orWhere('tanggal', 'like',"%".$cari."%")->paginate(10);
 
    	// mengirim data ke view index
        return view('perencanaan.index', ['data'=>$data]);
 
    }
    public function index()
    {
        
  

        $data = Perencanaan::paginate(10);
        return view('/perencanaan/index',compact('data'));
    }
    

  //   public function datarencana()
  // {
  //     return Datatables::of(Perencanaan::query())->make(true);
  // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/perencanaan/create',compact('data'));
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	  $this->validate($request, [
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'kode' => 'required',
            'debit' => 'required',
            'kredit' => 'required'
        ]);        
        $data = Perencanaan::create([
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'kode' => $request->kode,
            'debit' => $request->debit,
            'kredit' => $request->kredit

        ]);
      return redirect('/perencanaan')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Perencanaan::where('perencanaan','debit')::count();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
// method untuk edit data pegawai
public function edit($id)
{
    // mengambil data pegawai berdasarkan id yang dipilih
    $data = DB::table('perencanaan')->where('id',$id)->get();
    // passing data pegawai yang didapat ke view edit.blade.php
    return view('/perencanaan/edit',['data' => $data]);
 
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    // update data pegawai

    // $tanggal = $request -> get('tanggal');
    // $deskripsi = $request -> get('deskripsi');
    // $kode = $request -> get('kode');
    // $debit = $request -> get('debit');
    // $kredit = $request -> get('kredit');
    // $data = DB::update('update data set tanggal = ?, deskripsi = ?, kode = ?, debit = ?, kredit = ? where id=?', [$tanggal, $deskripsi, $kode, $debit, $kredit, $id]);

    DB::table('perencanaan')->where('id',$request->id)->update([
        'tanggal' => $request->tanggal,
        'deskripsi' => $request->deskripsi,
        'kode' => $request->kode,
        'debit' => $request->debit,
        'kredit' => $request->kredit
    ]);

        // $data=Perencanaan::all();
        // $data->tanggal = $request->get('tanggal');
        // $data->deskripsi = $request->get('deskripsi');
        // $data->kode = $request->get('kode');
        // $data->debit = $request->get('debit');
        // $data->kredit = $request->get('kredit');
        // $data->save();
    // $this->validate($request, [
    //         'tanggal'    =>  'required',
    //         'deskripsi'     =>  'required',
    //         'kode'     =>  'required',
    //         'debit'     =>  'required',
    //         'kredit'     =>  'required'
    //     ]);
    //     $data = Perencanaan::find($id);
    //     $data->tanggal = $request->get('tanggal');
    //     $data->deskripsi = $request->get('deskripsi');
    //     $data->kode = $request->get('kode');
    //     $data->debit = $request->get('debit');
    //     $data->kredit = $request->get('kredit');

    //     $data->save();
        return redirect('/perencanaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
// method untuk hapus data pegawai
public function hapus($id)
{


    // menghapus data pegawai berdasarkan id yang dipilih
    DB::table('perencanaan')->where('id',$id)->delete();
        
    // alihkan halaman ke halaman pegawai
    return redirect('/perencanaan')->with('success', 'Data telah dihapus');
}
}
