<?php
namespace App\Http\Controllers;
use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Rab;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }
    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }

    //Rab
    public function rab()
    {
        $rab = Rab::paginate(10);

        return view('rab.rab', ['rab'=>$rab]);
    }
    public function saveRab(Request $request)
    {
        $this->validate($request, [
            'kode_akun_rab' => 'required',
            'jenis_anggaran_rab' => 'required',
            'tahun_akademik_rab' => 'required',
            'sub_kode_akun_rab' => 'required',
            'rincian_anggaran_rab' => 'required',
            'jumlah_mata_anggaran' => 'required'
        ]);        
        $jumlah_total = $request->jumlah_mata_anggaran;
        $kode_akun_lengkap_rab = $request->kode_akun_rab;
        $kode_akun_lengkap_rab .= $request->sub_kode_akun_rab;

        $rab = Rab::create([
            'kode_akun_rab' => $request->kode_akun_rab,
            'jenis_anggaran_rab' => $request->jenis_anggaran_rab,
            'tahun_akademik_rab' => $request->tahun_akademik_rab,
            'sub_kode_akun_rab' => $request->sub_kode_akun_rab,
            'rincian_anggaran_rab' => $request->rincian_anggaran_rab,
            'jumlah_mata_anggaran' => $request->jumlah_mata_anggaran,
            'kode_akun_lengkap_rab' => $kode_akun_lengkap_rab,
            'jumlah_total' => $jumlah_total
        ]);
        return redirect('/rab');
    }

    public function cariRab(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cariRab;
 
        // mengambil data dari table sesuai pencarian data
        $rab = Rab::where('kode_akun_rab', 'like',"%".$cari."%")->orWhere('jenis_anggaran_rab', 'like',"%".$cari."%")
        ->orWhere('sub_kode_akun_rab', 'like',"%".$cari."%")->orWhere('rincian_anggaran_rab', 'like',"%".$cari."%")
        ->orWhere('jumlah_mata_anggaran', 'like',"%".$cari."%")->orWhere('kode_akun_lengkap_rab', 'like',"%".$cari."%")
        ->orWhere('jumlah_total', 'like',"%".$cari."%")->orWhere('tahun_akademik_rab', 'like',"%".$cari."%")->paginate(10);
 
    	// mengirim data ke view index
        return view('rab.rab', ['rab'=>$rab]);
 
    }
    
    public function editRab(Request $request)
    {
        
        // mengambil data pegawai berdasarkan id yang dipilih
        $rab = DB::table('rab')->where('kode_akun_lengkap_rab', $request->kode_akun_lengkap_rab)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('rab.editRab',['rab' => $rab]);
 
    }
    
    public function updateRab(Request $request)
    {
    // update data
    $jumlah_total = $request->jumlah_mata_anggaran;
    $kode_akun_lengkap_rab = $request->kode_akun_rab;
    $kode_akun_lengkap_rab .= $request->sub_kode_akun_rab;
    
    DB::table('rab')->where('kode_akun_lengkap_rab', $request->kode_akun_lengkap_rab)->update([
        'kode_akun_rab' => $request->kode_akun_rab,
        'jenis_anggaran_rab' => $request->jenis_anggaran_rab,
        'tahun_akademik_rab' => $request->tahun_akademik_rab,
        'sub_kode_akun_rab' => $request->sub_kode_akun_rab,
        'rincian_anggaran_rab' => $request->rincian_anggaran_rab,
        'jumlah_mata_anggaran' => $request->jumlah_mata_anggaran,
        'kode_akun_lengkap_rab' => $kode_akun_lengkap_rab,
        'Jumlah_total' => $jumlah_total
    ]);
    
    // alihkan halaman ke halaman pegawai
    return redirect('/rab');
    }

    public function deleteRab($id)
    {
    // menghapus data pegawai berdasarkan id yang dipilih
    DB::table('rab')->where('id',$id)->delete();
        
    // alihkan halaman ke halaman pegawai
    return redirect('/rab')->with('success', 'Data telah dihapus');
    }

}