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
            <li class="breadcrumb-item active">Mutasi</li>
        </ol>


        <div class="row">
            <div class="col">
                <a href="laporanRapb" ><img class="card-img-top" src="assets1/1.jpg"></a>
                    <h4 class="card-title text-md-center">Laporan RAPB</h4>
            </div>
            <div class="col">
                <a href="/laporanRab"><img class="card-img-top" src="assets1/rapb.png" alt="Card image"></a>
                
                <h4 class="card-title text-md-center">Laporan RAB</h4>
            </div>
            <div class="col">
                <a href="laporanAnggaran" ><img class="card-img-top" src="assets1/2.png"></a>
                    <h4 class="card-title text-md-center">Laporan Anggaran</h4>
            </div>
            <div class="col">
                <a href="laporanAmprahan" ><img class="card-img-top" src="assets1/perencanaan.png"></a>
                    <h4 class="card-title text-md-center">Laporan Amprahan</h4>
            </div>
            <div class="col">
                <a href="mutasi_realisasi" ><img class="card-img-top" src="assets1/3.jpg"></a>
                    <h4 class="card-title text-md-center">Laporan Realisasi</h4>
            </div>
        </div>
    </div>


    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <strong>Copyright &copy; Akademi Manajemen Informatika dan Komputer</div>.</strong> All rights
                reserved.
            </div>
        </div>
    </footer>
</div>
    
@endsection