@extends('dashboards.app')

@section('body')
    
<head>
  <title>Data Amprahan</title>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- <script src={{ url('assets1/vendor/jquery/jquery.min.js')}}></script>
<script src={{ url('assets1/js/bootstrap.min.js')}}></script>
<script src={{ url('assets1/css/bootstrap.min.css')}}></script> --> --}}

  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 

  <br/>
  <div class="container box">
   <h3 align="center">Masukan Data Realisasi</h3><br />
	
	<br/>
	<br/>
 
	<form action="/perencanaan/realisasi/store" method="post">
		{{ csrf_field() }}
    <div class="form-group">
       <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Masukan Tanggal" required>
    </div>

    <div class="form-group">
       <select name="jenis anggaran" id="jenis_anggaran" class="form-control input-lg dynamic" data-dependent="rincian_anggaran">
         <option value="">Select Jenis Anggaran</option>
           @foreach($anggaran as $p)
          <option value="{{ $p->jenis_anggaran}}">{{ $p->jenis_anggaran }}</option>
            @endforeach
       </select>
    </div>
   <br />
   <div class="form-group">
    <select name="rincian anggaran" id="rincian_anggaran" class="form-control input-lg dynamic" data-dependent="kode_akun_lengkap">
     <option value="">Select rincian</option>
    </select>
   </div>
   <br />
   <div class="form-group">
    <select name="kode akun lengkap" id="kode_akun_lengkap" class="form-control input-lg">
     <option value="">Select kode</option>
    </select>
   </div>
    <div class="form-group">
      <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Masukan Jumlah" required>
    </div>

   {{ csrf_field() }}
   <br />
   <br />
  <input type="submit" value="Simpan Data">
  <a type="submit" href="/amprahan"> Kembali</a>
  </div>
 </body>

 <script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#jenis_anggaran').change(function(){
  $('#rincian_anggaran').val('');
  $('#kode_akun_lengkap').val('');
 });

 $('#rincian_anggaran').change(function(){
  $('#kode_akun_lengkap').val('');
 });
 

});
</script>

  
@endsection