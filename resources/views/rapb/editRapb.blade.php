@extends('dashboards.app')

@section('conten')
 <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
        	<div class="offset-md-2">
            <!-- Remove This Before You Start -->
            <h1>Edit Data RAPB</h1>
            <hr>
            @foreach($rapb as $datas)
            <form action="/updateRapb" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control" id="kode_akun_rapb" name="kode_akun_rapb" hidden="true" value="{{ $datas->kode_akun_rapb }}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="kategori_rapb" name="kategori_rapb" hidden="true" value="{{ $datas->kategori_rapb }}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="sub_kode_rapb" name="sub_kode_rapb" hidden="true" value="{{ $datas->sub_kode_rapb }}">
                </div>

                <div class="form-group">
                        <label for="tahun_akademik">Tahun Akademik :</label>
                        <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik" value="{{ $datas->tahun_akademik }}">
                    </div>

                <div class="form-group">
                    <label for="semester">Semester :</label>
                    <input type="text" class="form-control" id="semester" name="semester" value="{{ $datas->semester }}">
                </div>

                <div class="form-group">
                    <label for="jumlah_mahasisaw">Jumlah Mahasiswa :</label>
                    <input type="text" class="form-control" id="jumlah_mahasiswa" name="jumlah_mahasiswa" value="{{ $datas->jumlah_mahasiswa }}">
                </div>

                <div class="form-group">
                    <label for="jumlah_sks">Jumlah SKS/MK :</label>
                    <input type="text" class="form-control" id="jumlah_sks" name="jumlah_sks" value="{{ $datas->jumlah_sks }}">
                </div>

                <div class="form-group">
                        <label for="besarnya">Besarnya :</label>
                        <input type="text" class="form-control" id="besarnya" name="besarnya" value="{{ $datas->besarnya }}">
                    </div>
             
                <div class="form-group">
                    <input type="text" class="form-control" id="jumlah_100" name="jumlah_100" hidden="true" value="{{ $datas->jumlah_100 }}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="jumlah_90" name="jumlah_90" hidden="true" value="{{ $datas->jumlah_90 }}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="kode_akun_lengkap_rapb" name="kode_akun_lengkap_rapb" hidden="true" value="{{ $datas->kode_akun_lengkap_rapb }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button class="btn btn-danger" href="/rapb">Back</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>    
        <!-- /.content -->
    </section>
    <!-- /.main-section -->

 @endsection