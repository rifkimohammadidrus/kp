@extends('dashboards.app')

@section('conten')
<!-- /.nav-collapse -->
<div id="content-wrapper">
    <!-- /.container-fluid -->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/index">Dashboard</a>
            </li>
            <li class="breadcrumb-item "><a href="/mutasi"> Mutasi</a></li>
            <li class="breadcrumb-item active">Amprahan</li>
        </ol>
    </div>
    <div class="content-wrapper">
        <section class="content" id="dw">
            <div class="container">
                <div class="row">
                    <!-- KOTAK UNTUK MENAMPILKAN TOTAL DATA -->
                    <div class="col-xl-3 col-sm-6 mb-3"></div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="text-center">Total Data Amprahan</div>
                                <h2 class="text-center">{{ $datas->total() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-info o-hidden h-100">
                            <div class="card-body">
                                <div class="mr-5">Total Amprahan</div>
                                <h2>{{"Rp. ".format_uang($datas->sum('jumlah'))}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3"></div>
                </div>
                    
                <div class="row">
                    
                    
                    <div class="container">
                        <h5><b>Filter Data</b></h5>
                        <form action="/laporanAmprahan" method="get">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control" name="cari" placeholder="Search"
                                            value="{{ old('cari') }}">
                                        <button class="btn btn-success my-2 my-sm-0" type="submit"
                                            value="CARI">Cari</button>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="container">
                        <div class="row">
                        <!-- TABLE UNTUK MENAMPILKAN DATA TRANSAKSI -->
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO</th>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                            <th>Kode Akun</th>
                                            <th>Jumlah</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- LOOPING MENGGUNAKAN FORELSE, DIRECTIVE DI LARAVEL 5.6 -->
                                        <?php $no = 0;?>
                                        @forelse($datas as $row)
                                        <?php $no++ ;?>
                                        <tr>
                                            <td class="text-center">{{$no}}</td>
                                            <td>{{$row->tanggal}}</td>
                                            <td>{{$row->rincian_anggaran}}</td>
                                            <td>{{$row->kode_akun_lengkap}}</td>
                                            <td>{{"Rp. ".format_uang($row->jumlah)}}</td>
                                        </tr>

                                        @empty
                                        <tr>
                                            <td class="text-center" colspan="7">Data Not Found</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                {{ $datas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <div class="container">
        <div class="row">
            <div class="mb-4">
                <form action="/mutasi_pdf" method="get">
                    <input type="date" class="form-control" name="cari" value="{{ $coba }}" hidden="">
                    <button class="btn btn-primary">Cetak PDF</button>
                </form>

                {{-- <a href="/mutasi/export_excel" class="btn btn-primary" target="_blank">CETAK EXEL</a> 

                            <button href="" class="btn btn-warning" target="_blank">IMPORT EXEL</button>  --}}
            </div>
        </div>
    </div>
</div>

​
@section('js')
<script>
    $('#start_date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });​
    $('#end_date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

</script>
@endsection
@endsection
