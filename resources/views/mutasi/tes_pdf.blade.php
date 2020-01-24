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
    <br>Amprahan Tanggal {{$coba}}
<table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>TANGGAL</th>
                <th>DESKRIPSI</th>
                <th>KODE</th>
                <th>JUMLAH</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1 @endphp
            @foreach($dataku as $p)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$p->tanggal}}</td>
                <td>{{$p->rincian_anggaran}}</td>
                <td>{{$p->kode_akun_lengkap}}</td>
                <td>{{"Rp. ".format_uang($p->jumlah)}}</td>
            </tr>
            @endforeach
            
        </tbody>
        <tfoot>
                <tr>
                    <th colspan="4">Jumlah Amprahan</th>
                    <th>{{"Rp. ".format_uang($dataku->sum('jumlah'))}}</th>
                </tr>
            </tfoot>
</table>
<br><br>
<table class="table table-borderless">
                
        <div class="page-break"></div>
        <thead>
            <td style="font-size: 12px">DIAJUKAN OLEH, <br><br><br><br>________________
            <br>WD II AMIK GARUT</td>
            <td style="font-size: 12px">DISETUJUI OLEH, <br><br><br><br>________________
            <br>DIREKTUR AMIK GARUT</td>
             <td style="font-size: 12px">DIAJUKAN OLEH, <br><br><br><br>________________
            <br>BENDAHARA YGW</td>
            <td style="font-size: 12px"><br><br><br><br>________________
            <br>KETUA YGW</td>
        </thead>
    </table>