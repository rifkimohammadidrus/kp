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
                <li class="breadcrumb-item active"><a href="mutasi">Mutasi</a></li>
                <li class="breadcrumb-item active">Laporan Perencanaan</li>
            </ol>
            <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-5"> Cari data: <b><span id="total_records"></span></b></div>
                            <div class="col-md-5">
                                <div class="input-group input-daterange">
                                    
                                    <input type="text" name="from_date" id="from_date" readonly class="form-control" />
                                    <div class="input-group-addon">to</div>
                                    <input type="text"  name="to_date" id="to_date" readonly class="form-control" />
                                </div>
                            </div>
                        <div class="col-md-2">
                            <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
                            <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
                        </div>
                    </div>
                </div>
    <div class="container">
        <table class="table table-striped" id="mytable">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Tanggal</th>
                    <th>Deskripsi Pengeluaran </th>
                    <th>Kode</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($perencanaan as $table) 
                <tr>
                    <td>{{$table->id}}</td>
                    <td>{{$table->tanggal}}</td>
                    <td>{{$table->deskripsi}}</td>
                    <td>{{$table->kode}}</td>
                    <td>{{$table->debit}}</td>
                    <td>{{$table->kredit}}</td>
                </tr>
                @endforeach                        
            </tbody>
        </table>
    </div>  
    </div>

    
@endsection





{{-- @extends('dashboards.app')

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
    </div>
    
    <div class="container">
        <h2>Contextual Classes</h2>
        <table class="table">
            <thead>
            <tr>
                <th>id </th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Dibuat pada</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ($mutasi as $key)
                <td>{{$key->id}}</td>
                <td>{{$key->name}}</td>
                <td>{{$key->email}}</td>
                <td>{{$key->password}}</td>
                <td>{{$key->created_at}}</td>
                @endforeach 
            </tr>      
            </tbody>
        </table>
        </div>
    </div>    
@endsection
 --}}