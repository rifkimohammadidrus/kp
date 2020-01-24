<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mutasi;
use App\Perencanaan;
use App\Rapb;
use App\Rab;
use App\Anggaran;
use App\Amprahan;
use App\Realisasi;
use PDF;
use Dompdf\Dompdf;
use Carbon\Carbon;
use App\Exports\PerencanaanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class MutasiController extends Controller
{
        
    public function laporanAmprahan(Request $request){
        $datas = Amprahan::orderBy('tanggal', 'DESC');
        $datas = Amprahan::paginate(10);   
        $coba ="";
        $cari = $request->cari;

        $coba = $cari;

        $datas = Amprahan::where('tanggal', 'like', "%".$cari. "%")->paginate(10);

        
        return view('mutasi.laporanAmprahan', ['datas'=>$datas, 'coba'=>$coba ]);
 
     }

     public function cetak_pdf(Request $request)

     {    	
        $coba ="";
        $cari = $request->cari;
        $coba = $cari;

        $dataku = Amprahan::where('tanggal', 'like', "%".$cari. "%")->get();

         //return view('mutasi.cek_pdf', ['dataku'=>$dataku, 'start_date'=>$start_date, 'end_date'=>$end_date]);
 
         $pdf = PDF::loadview('/mutasi/tes_pdf',['dataku'=>$dataku, 'coba' => $coba]);
         return $pdf->stream();
     }
    //Realisasi

    public function rumah(Request $request){
        $datas = Realisasi::orderBy('tanggal', 'DESC');
        $datas = Realisasi::paginate(10);
        $tanggalMulai =  "";
        $tanggalAkhir = "";
 
         if (!empty($request->start_date) && !empty($request->end_date)) {
             //MAKA DI VALIDASI DIMANA FORMATNYA HARUS DATE
             $this->validate($request, [
                 'start_date' => 'nullable|date',
                 'end_date' => 'nullable|date'
             ]);
             
             //START & END DATE DI RE-FORMAT MENJADI Y-m-d H:i:s
             $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
             $end_date = Carbon::parse($request->end_date)->format('Y-m-d') ;
 
             $tanggalMulai =  $start_date;
             $tanggalAkhir = $end_date;
      
             //DITAMBAHKAN WHEREBETWEEN CONDITION UNTUK MENGAMBIL DATA DENGAN RANGE
             $datas = $datas->whereBetween('tanggal', [$start_date, $end_date]);
 
         } else {
             //JIKA START DATE & END DATE KOSONG, MAKA DI-LOAD 10 DATA TERBARU
             
         }        
            return view('mutasi.mutasi_realisasi', [ 
                'datas' => $datas, 'tanggalMulai' => $tanggalMulai, 'tanggalAkhir' =>$tanggalAkhir
         ]);
 
     }


     public function cetak_pdf_realisasi(Request $request)

     {

        $tanggalMulai =  "";
        $tanggalAkhir = "";    	
         //START & END DATE DI RE-FORMAT MENJADI Y-m-d H:i:s
         $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
         $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
 
         //DITAMBAHKAN WHEREBETWEEN CONDITION UNTUK MENGAMBIL DATA DENGAN RANGE
         $dataku = Realisasi::whereBetween('tanggal', [$start_date, $end_date])->get();

            $tanggalMulai =  $start_date;
            $tanggalAkhir = $end_date;
 
         //return view('mutasi.cek_pdf', ['dataku'=>$dataku, 'start_date'=>$start_date, 'end_date'=>$end_date]);
         $data2 = Amprahan::paginate(10);  

         $pdf = PDF::loadview('/mutasi/realisasi_pdf',['dataku'=>$dataku, 'tanggalMulai' => $tanggalMulai, 'tanggalAkhir' =>$tanggalAkhir, 'data2'=>$data2]);
         return $pdf->stream();
     }

        public function export_excel()
    {
        return Excel::download(new PerencanaanExport, 'perencanaan.xlsx');
    }


    public function anggaran()
    {
        $anggaran = Anggaran::all();
        return view('mutasi.laporanAnggaran', compact('anggaran'));
    }

    public function cariAnggaran(Request $request)
    {
        $cari = $request->cari;
        $anggaran = Anggaran::where('kode_akun', 'like', "%".$cari. "%")->orWhere('jenis_anggaran', 'like', "%".$cari. "%")
        ->orWhere('sub_kode_akun', 'like', "%".$cari. "%")->orWhere('rincian_anggaran', 'like', "%".$cari. "%")
        ->orWhere('kode_akun_lengkap', 'like', "%".$cari. "%")->paginate(10);
        return view('mutasi.laporanAnggaran', ['anggaran'=>$anggaran]);
    }




    public function cariRab(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
 
        // mengambil data dari table sesuai pencarian data
        $rab = Rab::where('kode_akun_rab', 'like',"%".$cari."%")->orWhere('jenis_anggaran_rab', 'like',"%".$cari."%")
        ->orWhere('sub_kode_akun_rab', 'like',"%".$cari."%")->orWhere('rincian_anggaran_rab', 'like',"%".$cari."%")
        ->orWhere('jumlah_mata_anggaran', 'like',"%".$cari."%")->orWhere('kode_akun_lengkap_rab', 'like',"%".$cari."%")
        ->orWhere('jumlah_total', 'like',"%".$cari."%")->orWhere('tahun_akademik_rab', 'like',"%".$cari."%")->paginate(10);

    	// mengirim data ke view index
        return view('mutasi.laporanRab', ['rab'=>$rab]);
 
    }
    public function cariRapb(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
 
        // mengambil data dari table  sesuai pencarian data
        $rapb = Rapb::where('kategori_rapb', 'like',"%".$cari."%")->orWhere('semester', 'like',"%".$cari."%")
        ->orWhere('jumlah_mahasiswa', 'like',"%".$cari."%")->orWhere('jumlah_sks', 'like',"%".$cari."%")
        ->orWhere('besarnya', 'like',"%".$cari."%")->orWhere('jumlah_100', 'like',"%".$cari."%")
        ->orWhere('jumlah_90', 'like',"%".$cari."%")->orWhere('tahun_akademik', 'like',"%".$cari."%")->paginate(10);
    	// mengirim data  ke view index
        return view('mutasi.laporanRapb', ['rapb'=>$rapb]);
 
    }
    
    public function home()
    {
        return view('mutasi.mutasi');
    }
    public function rapb(Rapb $rapb)
    {
        $rapb = Rapb::all();

        return view('mutasi.laporanRapb', compact('rapb'));
    }

    public function rab(Rab $rab)
    {
        $rab = Rab::all();

        return view('mutasi.laporanRab', compact('rab'));
    }

    public function perencanaan(Perencanaan $perencanaan)
    {
        $perencanaan = Perencanaan::all();

        return view('mutasi.laporanPerencanaan', compact('perencanaan'));
    }
    public function generatePDF()
    {
        
        $anggaran = Anggaran::all();
        $pdf = new Dompdf();
        $pdf->set_option("isPhpEnabled", true);
        $pdf = PDF::loadView('mutasi.anggaran-pdf', ['anggaran'=>$anggaran]);
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf ->get_canvas();
        
        return $pdf->stream();
    }
    
    public function rabPDF()
    {
        $rab = Rab::all();
        $pdf = new Dompdf();
        $pdf->set_option("isPhpEnabled", true);
        $pdf = PDF::loadView('mutasi.rab-pdf', ['rab'=>$rab]);
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf ->get_canvas();
        
        return $pdf->stream();
    }
    public function rapbPDF()
    {
        $rapb = Rapb::all();
        $pdf = new Dompdf();
        $pdf->set_option("isPhpEnabled", true);
        $pdf = PDF::loadView('mutasi.rapb-pdf', ['rapb'=>$rapb]);
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf ->get_canvas();
        return $pdf->stream();
    }
}
