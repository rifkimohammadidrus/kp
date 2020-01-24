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
        <div class="text-center"> <b> Laporan Rencana Anggaran Pembelanjaan Biaya (RAPB)</b></div><br>
        <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Tahun Akademik</th>
                            <th>Semester</th>
                            <th>Jumlah Mahasiswa</th>
                            <th>Jumlah SKS/MK</th>
                            <th>Besarnya</th>
                            <th>Jumlah 100%</th>
                            <th>Jumlah 90%</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php $i=1 @endphp
                        @foreach($rapb as $RAPB)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$RAPB->kategori_rapb}}</td>
                            <td>{{$RAPB->tahun_akademik}}</td>
                            <td>{{$RAPB->semester}}</td>
                            <td>{{$RAPB->jumlah_mahasiswa}}</td>
                            <td>{{$RAPB->jumlah_sks}}</td>
                            <td>{{"Rp. ".format_uang($RAPB->besarnya)}}</td>
                            <td>{{"Rp. ".format_uang($RAPB->jumlah_100)}}</td>
                            <td>{{"Rp. ".format_uang($RAPB->jumlah_90)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                            <tr>
                                <th colspan="6">Jumlah</th>
                                <th>{{"Rp. ".format_uang($rapb->sum('besarnya'))}}</th>
                                <th>{{"Rp. ".format_uang($rapb->sum('jumlah_100'))}}</th>
                                <th>{{"Rp. ".format_uang($rapb->sum('jumlah_90'))}}</th>
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