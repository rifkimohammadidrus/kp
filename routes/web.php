<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auths/login');
});

Auth::routes();
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');


Route::group(['middleware' => 'auth'], function () {
    //halaman dashboard
    Route::get('/index', 'DashboardController@index');

    //mutasi
    Route::get('/mutasi', 'MutasiController@home');
    Route::get('/laporanRapb', 'MutasiController@rapb')->name('rapb');
    Route::get('/laporanRab', 'MutasiController@rab')->name('rab');
    Route::get('/cariMutasi','MutasiController@cariRab');
    Route::get('/cariMutasiRapb','MutasiController@cariRapb');
    
    Route::get('/laporanAnggaran', 'MutasiController@anggaran');
    Route::get('/laporanAnggaran', 'MutasiController@cariAnggaran');
    Route::get('anggaran-pdf','MutasiController@generatePDF');
    Route::get('rab-pdf','MutasiController@rabPDF');
    Route::get('rapb-pdf','MutasiController@rapbPDF');
    
    Route::get('/tes_pdf', 'MutasiController@cetak_pdf')->name('mutasi_pdf.pdf');
    Route::get('/laporanAmprahan', 'MutasiController@laporanAmprahan');
    Route::get('/mutasi_pdf', 'MutasiController@cetak_pdf')->name('mutasi_pdf.pdf');
    Route::get('/mutasi/export_excel', 'MutasiController@export_excel');


    Route::get('/mutasi_realisasi', 'MutasiController@rumah');
    Route::get('/realisasi_pdf', 'MutasiController@cetak_pdf_realisasi')->name('mutasi_pdf.pdf');
    Route::get('/mutasi/export_excel', 'MutasiController@export_excel');

    Route::get('/changePassword','HomeController@showChangePasswordForm');
    Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
    
    //rab
    Route::get('/rab', 'HomeController@rab')->name('rab');
    Route::post('/saverab', 'HomeController@saveRab');
    Route::get('/gajipegawai', 'HomeController@gajiPegawai');
    Route::get('/pengajarandanpendidikan', 'HomeController@pengajaranDanPendidikan');
    Route::get('/administrasiketatausahaan', 'HomeController@administrasiKetatausahaan');
    Route::get('/rumahtangga', 'HomeController@rumahTangga');
    Route::get('/pemeliharaandanperbaikan', 'HomeController@pemeliharaanDanPerbaikan');
    Route::get('/investasi', 'HomeController@Investasi');
    Route::get('/akreditasiprodi', 'HomeController@akreditasiProdi');
    Route::get('/cariRab','HomeController@cariRab');

    Route::get('/editRab/{kode_akun_lengkap_rab}', 'HomeController@editRab');
    Route::post('/updateRab', 'HomeController@updateRab');

    Route::get('/deleteRab/{id}','HomeController@deleteRab');

    //rapb
    Route::get('/rapb', 'RapbController@rapb')->name('rapb');
    Route::post('/saverapb', 'RapbController@saveRapb');
        //Transitoris
    Route::get('/danabangunan', 'RapbController@danaBangunan');
    Route::get('/biayatetap', 'RapbController@biayaTetap');
    Route::get('/biayasks', 'RapbController@biayaSks');
    Route::get('/biayapraktikum', 'RapbController@biayaPraktikum');
        //Non-Transitoris
    Route::get('/registrasi', 'RapbController@registrasi');
    Route::get('/perpustakaan', 'RapbController@perpustakaan');
    Route::get('/kemahasiswaan', 'RapbController@kemahasiswaan');
    Route::get('/kerjapraktek', 'RapbController@kerjaPraktek');
    Route::get('/tugasakhir', 'RapbController@tugasAkhir');
    Route::get('/biayapbma', 'RapbController@biayaPbma');
    Route::get('/biayauts', 'RapbController@biayaUts');
    Route::get('/biayauas', 'RapbController@biayaUas');
    Route::get('/biayawisuda', 'RapbController@biayaWisuda');
    Route::get('/cariRapb','RapbController@cari');

    Route::get('/editRapb/{kode_akun_lengkap_rapb}', 'RapbController@editRapb');
    Route::post('/updateRapb', 'RapbController@updateRapb');

    Route::get('/deleteRapb/{id_rapb}','RapbController@deleteRapb');


    //Anggaran
    Route::get('/anggaran', 'AnggaranController@anggaran')->name('anggaran');
    Route::post('/saveanggaran', 'AnggaranController@saveAnggaran');
    Route::get('/carianggaran', 'AnggaranController@cariAnggaran' );
    Route::get('/ubah/{kode_akun_lengkap}','AnggaranController@ubah');
    Route::post('/ganti','AnggaranController@ganti');
    Route::get('/delete/{id}','AnggaranController@delete');

    //Amprahan
    Route::get('/amprahan', 'AmprahanController@amprahan');
    Route::get('/perencanaan/create_amprahan', 'DynamicDependent@index');
    Route::post('perencanaan/create_amprahan/fetch', 'DynamicDependent@fetch')->name('dynamicdependent.fetch');
    Route::post('/perencanaan/amprahan/store','AmprahanController@store');
    Route::get('/edit/{kode_akun_lengkap}','AmprahanController@edit');
    Route::post('/update','AmprahanController@update');
    Route::get('/hapus/{id}','AmprahanController@hapus');
    Route::get('/cari', 'AmprahanController@cari');



    //Realisasi

    Route::get('/perencanaan/realisasi', 'RealisasiController@index');
    Route::get('/perencanaan/realisasi/create_realisasi', 'InputRealisasiController@home');
    Route::post('/perencanaan/realisasi/create_realisasi/fetch', 'InputRealisasiController@fetch')->name('inputrealisasi.fetch');
    Route::post('/perencanaan/realisasi/store','RealisasiController@store');
    Route::get('/perencanaan/realisasi/edit_realisasi/{kode_akun_lengkap}','RealisasiController@edit');
    Route::post('/perencanaan/realisasi/update','RealisasiController@update');
    Route::get('/perencanaan/realisasi/hapus/{id}','RealisasiController@hapus');
    Route::get('perencanaan/realisasi/cari', 'RealisasiController@cari');





  
     


    Route::get('/create_rincian', 'JenisAnggaranController@create');
    Route::post('/store', 'JenisAnggaranController@store'); 

    Route::get('/coba', 'JenisAnggaranController@jenisanggaran');
});