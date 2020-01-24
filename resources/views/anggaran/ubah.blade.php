@extends('dashboards.app')

@section('conten')
 <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
        	<div class="offset-md-2">
            <!-- Remove This Before You Start -->
            <h1>Edit Data Anggaran</h1>
            <hr>
            @foreach($anggaran as $datas)
            <form action="/ganti" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik" hidden="true" value="{{ $datas->tahun_akademik }}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="kode_akun" name="kode_akun" hidden="true" value="{{ $datas->kode_akun }}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="jenis_anggaran" name="jenis_anggaran" hidden="true" value="{{ $datas->jenis_anggaran }}">
                </div>

                <div class="form-group">
                    <label for="sub_kode_akun">Sub Kode Akun :</label>
                    <input type="text" class="form-control" id="sub_kode_akun" name="sub_kode_akun" value="{{ $datas->sub_kode_akun }}">
                </div>

                <div class="form-group">
                    <label for="rincian_anggaran">Rincian Anggaran :</label>
                    <input type="text" class="form-control" id="rincian_anggaran" name="rincian_anggaran" value="{{ $datas->rincian_anggaran}}">
                </div>
             
                <div class="form-group">
                    <input type="text" class="form-control" id="kode_akun_lengkap" name="kode_akun_lengkap" hidden="true" value="{{ $datas->kode_akun_lengkap }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button class="btn btn-danger" href="/anggaran">Back</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>    
        <!-- /.content -->
    </section>
    <!-- /.main-section -->

 @endsection