@extends('dashboards.app')

@section('conten')
    <link href={{ url('assets1/css/bootsrap.css')}} rel="stylesheet">
 <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
        	<div class="offset-md-2">
            <!-- Remove This Before You Start -->
            <h1>Edit Data Amprahan</h1>
            <hr>
            @foreach($amprahan as $datas)
            <form action="/update" method="post">
                {{ csrf_field() }}
             
                <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $datas->tanggal }}">
                </div>
                <div class="form-group">
                    <label for="debit">Deskripsi:</label>
                    <textarea class="form-control" id="rincian_anggaran" name="rincian_anggaran">{{ $datas->rincian_anggaran }}</textarea>
                </div>
                <div class="form-group">
                    <label for="kode_akun">Kode Akun:</label>
                    <input type="text" class="form-control" id="kode_akun_lengkap" name="kode_akun_lengkap" value="{{ $datas->kode_akun_lengkap }}">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah :</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $datas->jumlah }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button class="btn btn-danger" href="/perencanaan">Back</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>    
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
 @endsection