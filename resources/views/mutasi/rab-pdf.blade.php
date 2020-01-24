<html lang="en">

<head>
    <title>Cetak RAPB</title>
    <style type="text/css">
        .page-break {
            page-break-after: always;
        }
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    
        h1 {
            color: #000033
        }
    
        h2 {
            color: #000055
        }
    
        h3 {
            color: #000077
        }
    
    </style>
    <link rel="stylesheet" href={{('css/bootstrap.min.css')}}>
    <table>
            <tr>
                <th><img src="assets1/logo-amik.png" style="width:110px;height:100px"></th>
                <td align="center" style="width: 580px;">
                    <font style="font-size: 18px"><br><b>YAYASAN GRIYA WINAYA GARUT</b></font>
                    <font style="font-size: 18px"><br><b>AKADEMI MANAJEMEN INFORMATIKA DAN KOMPUTER</b></font>
                    <font style="font-size: 18px"><br><b>(AMIK) GARUT</b></font>
                    <br>Kampus : Jl. Pahlawan No.32 Telp./Fax. (0262) 237137/540393 Tarogong Kidul-Garut
                    <br>Website : www.amikgarut.ac.id e-mail : info@amikgarut.ac.id
                </td>
            </tr>
            <hr>
            <hr>
        </table>
        <div class="text-center"> <b> Laporan Rencana Anggaran Biaya (RAB)</b></div><br>
        <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Akun Induk</th>
                            <th>Jenis Mata Anggaran</th>
                            <th>Tahun Akademik</th>
                            <th>Sub Kode Akun</th>
                            <th>Rincian Anggaran</th>
                            <th>Jumlah Mata Angg</th>
                            <th>Kode Akun Lengkap</th>
                            <th>Jumlah Total</th>
        
                        </tr>
                    </thead>
                    <tbody>
                            @php $i=1 @endphp
                            @foreach($rab as $RAB) 
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$RAB->kode_akun_rab}}</td>
                            <td>{{$RAB->jenis_anggaran_rab}}</td>
                            <td>{{$RAB->tahun_akademik_rab}}</td>
                            <td>{{$RAB->sub_kode_akun_rab}}</td>
                            <td>{{$RAB->rincian_anggaran_rab}}</td>
                            <td>{{"Rp. ".format_uang($RAB->jumlah_mata_anggaran)}}</td>
                            <td>{{$RAB->kode_akun_lengkap_rab}}</td>
                            <td>{{"Rp. ".format_uang($RAB->jumlah_total)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                            <tr>
                                <th colspan="8">Jumlah Total</th>
                                <th>{{"Rp. ".format_uang($rab->sum('jumlah_total'))}}</th>
                            </tr>
                        </tfoot>
                </table>
            </div>

            <br><br>
    <table class="table table-borderless">
                    
            <div class="page-break"></div>
            <thead>
                <td style="font-size: 12px">DIAJUKAN OLEH, <br><br><br><br>________________
                <br>WD II AMIK GARUT</td>
                <td style="font-size: 12px">DISETUJUI OLEH, <br><br><br><br>________________
                <br>DIREKTUR AMIK GARUT</td>
                 <td style="font-size: 12px">DISETUJUI OLEH, <br><br><br><br>________________
                <br>BENDAHARA YGW</td>
                <td style="font-size: 12px"><br><br><br><br>________________
                <br>KETUA YGW</td>
            </thead>
        </table>
        
</body>

</html>