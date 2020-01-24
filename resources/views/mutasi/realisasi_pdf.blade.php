<html lang="en">

<head>
    <title>Cetak Realisasi</title>
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
        <div class="text-center"> <b> Laporan Realisasi Tanggal {{$tanggalMulai}} s/d {{$tanggalAkhir}}</b></div><br>
        <div class="table-responsive">
        <table class="table table-bordered">
                <thead>
                    <tr> 
                        <th rowspan="2">No</th>
                        <th rowspan="2">TANGGAL</th>
                        <th rowspan="2">DESKRIPSI</th>
                        <th rowspan="2">KODE</th>
                        <th colspan="2" class="text-center">JUMLAH</th>
                    </tr>
                    <tr>
                        <th width="80">Amprahan</th>
                        <th width="80">Realisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach($dataku as $p)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$p->tanggal}}</td>
                        <td>{{$p->rincian_anggaran}}</td>
                        <td>{{$p->kode_akun_lengkap}}</td>
                        <td></td>
                         <td>{{"Rp. ".format_uang($p->jumlah)}}</td>
                    </tr>

                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Jumlah Realisasi</th>
                        
                        <th>{{"Rp. ".format_uang($data2->sum('jumlah'))}}</th>
                        
                        <th>{{"Rp. ".format_uang($dataku->sum('jumlah'))}}</th>
                    </tr>
                    <tr>
                        <th colspan="4">Kekurangan/Kelebihan</th>
                        <th class="text-center" colspan="2">{{"Rp. ".format_uang($data2->sum('jumlah') - $p->sum('jumlah'))}}</th>
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