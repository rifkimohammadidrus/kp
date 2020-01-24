@extends('dashboards.app')

@section('body')


<div id="content-wrapper">
    <!-- /.container-fluid -->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/index">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a href="/mutasi">Mutasi</a></li>
            <li class="breadcrumb-item active">Laporan RAPB</li>
        </ol>

        <form class="cari" action="/cariMutasiRapb" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="cari" placeholder="Search" value="{{ old('cari') }}">
                <button class="btn btn-success my-2 my-sm-0" type="submit" value="CARI">Cari</button>
            </div>
        </form>
        <div class="container">
            <table class="table table-striped table-bordered" id="mytable">
                <thead>
                    <tr>
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
                    @foreach($rapb as $RAPB)
                    <tr>
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
            </table>
            <table>
                    <tr>
                        <td><b>Total Besarnya</b></td>
                        <td>: <b>{{"Rp. ".format_uang($rapb->sum('besarnya'))}}</b></td>
                    </tr>
                    <tr>
                        <td><b>Total 100%</b></td>
                        <td>: <b>{{"Rp. ".format_uang($rapb->sum('jumlah_100'))}}</b></td>
                    </tr>
                    <tr>
                        <td><b>Total 90%</b></td>
                        <td>: <b>{{"Rp. ".format_uang($rapb->sum('jumlah_90'))}}</b></td>
                    </tr>
            </table>
        </div>
        <div class="container">
            <button><a href="rapb-pdf">Cetak</a> </button>
        </div>
    </div>
</div>
@endsection
