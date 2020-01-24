@extends('dashboards.app')

@section('conten')
 <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
        	<div class="offset-md-2">
            <!-- Remove This Before You Start -->
            <h1>Edit Data RAB</h1>
            <hr>
            @foreach($rab as $datas)
            <form action="/updateRab" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control" id="kode_akun_rab" name="kode_akun_rab" hidden="true" value="{{ $datas->kode_akun_rab }}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="jenis_anggaran_rab" name="jenis_anggaran_rab" hidden="true" value="{{ $datas->jenis_anggaran_rab }}">
                </div>

                <div class="form-group">
                    <label for="tahun_akademik_rab">Tahun Akademik :</label>
                    <input type="text" class="form-control" id="tahun_akademik_rab" name="tahun_akademik_rab" value="{{ $datas->tahun_akademik_rab }}">
                </div>

                <div class="form-group">
                    <label for="sub_kode_akun">Sub Kode Akun :</label>
                    <input type="text" class="form-control" id="sub_kode_akun_rab" name="sub_kode_akun_rab" value="{{ $datas->sub_kode_akun_rab }}">
                </div>

                <div class="form-group">
                    <label for="rincian_anggaran">Rincian Anggaran :</label>
                    <input type="text" class="form-control" id="rincian_anggaran_rab" name="rincian_anggaran_rab" value="{{ $datas->rincian_anggaran_rab }}">
                </div>

                <div class="form-group">
                        <label for="jumlah_mata_anggaran">Jumlah Mata Anggaran :</label>
                        <input type="text" class="form-control" id="jumlah_mata_anggaran" name="jumlah_mata_anggaran" value="{{ $datas->jumlah_mata_anggaran }}">
                    </div>
             
                <div class="form-group">
                    <input type="text" class="form-control" id="kode_akun_lengkap_rab" name="kode_akun_lengkap_rab" hidden="true" value="{{ $datas->kode_akun_lengkap_rab }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button class="btn btn-danger" href="/rab">Back</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>    
        <!-- /.content -->
    </section>
    <!-- /.main-section -->

 @endsection