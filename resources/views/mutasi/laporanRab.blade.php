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
                <li class="breadcrumb-item "><a href="mutasi">Mutasi</a></li>
                <li class="breadcrumb-item active">Laporan RAB</li>
            </ol>

            <form class="cari" action="/cariMutasi" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="cari" placeholder="Search" value="{{ old('cari') }}">
                    <button class="btn btn-success my-2 my-sm-0" type="submit" value="CARI">Cari</button>
                </div>
              </form>
            <div class="container">
                <table class="table table-striped table-bordered" id="mytable">
                    <thead>
                        <tr>
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
                        @foreach($rab as $RAB) 
                        <tr>
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
                </table>
                <table>
                        <tr>
                            <td><b>Jumlah Total</b></td>
                            <td>: <b>{{"Rp. ".format_uang($rab->sum('jumlah_total'))}}</b></td>
                        </tr>
                    </table>
            </div>
        </div>
        <div class="container">
            <button><a href="rab-pdf">Cetak</a> </button>
        </div>
    </div>

@endsection
