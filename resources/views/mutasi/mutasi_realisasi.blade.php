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
            <li class="breadcrumb-item active">Realisasi</li>
        </ol>
    </div>

    <div class="content-wrapper">
        <section class="content" id="dw">
            <div class="container">
                
                <!-- KOTAK UNTUK MENAMPILKAN TOTAL DATA -->
                
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3"></div>
                    <div class="col-xl-1 col-sm-6 mb-1"></div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-info o-hidden h-100">
                            <div class="card-body">
                                <div class="mr-5">Total Realisasi</div>
                                <h2>{{"Rp. ".format_uang($datas->sum('jumlah'))}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3"></div>
                </div>
            <br><br>
            <!-- FORM UNTUK FILTER DATA -->
            <div class="col-md-12">
                <h3 class="text-center"><i class="icon-user"></i>  FILTER REALISASI </h2> <br>
            </div>
                <form action="/mutasi_realisasi" method="get">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Mulai Tanggal</span>
                                </div>
                                <input type="date" name="start_date" 
                                    class="form-control {{ $errors->has('start_date') ? 'is-invalid':'' }}"
                                    id="start_date"
                                    value="{{ request()->get('start_date') }}"
                                    >
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Sampai Tanggal</span>
                                </div>
                                <input type="date" name="end_date" 
                                    class="form-control {{ $errors->has('end_date') ? 'is-invalid':'' }}"
                                    id="end_date"
                                    value="{{ request()->get('end_date') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button class="btn btn-primary ">SEARCH</button>
                            </div>
                        </div>
                    </div>
                </form><br><br>
            
            
                <!-- TABLE UNTUK MENAMPILKAN DATA TRANSAKSI -->
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead >
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Kode Akun</th>
                                <th>Jumlah</th>
                                
                            </tr>
                        </thead-lig>
                        <tbody>
                            <!-- LOOPING MENGGUNAKAN FORELSE, DIRECTIVE DI LARAVEL 5.6 -->
                            <?php $no = 0;?>
                                @forelse($datas as $row)
                                <?php $no++ ;?>
                            <tr>
                                <td>{{$no}}</td>
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
                    
                </div>
            </div>
            <div class="col-md-2">
                    <form action="/realisasi_pdf">                                    
                        <input type="text" name="start_date" value="{{$tanggalMulai}}" hidden="true">
                        <input type="text" name="end_date" value="{{$tanggalAkhir}}" hidden="true">  
                        <button class="btn btn-primary">Cetak PDF</button>                                                                   
                    </form> 
                </div>
        </section>  
        <br><br><br>
    </div>
</div>
​
@section('js')
    <script>
        $('#start_date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
​
        $('#end_date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
@endsection