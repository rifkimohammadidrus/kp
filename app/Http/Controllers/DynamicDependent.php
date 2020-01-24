<?php

namespace App\Http\Controllers;
use app\Anggaran;
use DB;
use Illuminate\Http\Request;

class DynamicDependent extends Controller
{
   function index(){
   	$anggaran = DB::table('anggarans')
   	->groupBy('jenis_anggaran')
   	->get();
     return view('perencanaan.create_amprahan')->with('anggaran', $anggaran);
   }
    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('anggarans')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }
}
