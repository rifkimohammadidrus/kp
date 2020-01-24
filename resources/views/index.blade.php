@extends('dashboards.app')

@section('conten')

<div id="content-wrapper">
    
    <!-- /.container-fluid -->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/index">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->

        <div class="row">
            <div class="col">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="mr-5">RAPB</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="rapb">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="mr-5"> RAB</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="rab">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="mr-5">Anggaran</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="anggaran">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div> 
            <div class="col">
                    <div class="card text-white bg-info o-hidden h-100">
                        <div class="card-body">
                            <div class="mr-5">Amprahan</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="amprahan">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col">
                        <div class="card text-white bg-secondary o-hidden h-100">
                            <div class="card-body">
                                <div class="mr-5">Realisasi</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="/perencanaan/realisasi">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>           
        </div><br>
    </div>
</div>
@endsection
