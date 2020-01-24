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
                <li class="breadcrumb-item active"><a href="rapb">RAPB</a></li>
            </ol>
    
    <div class="container">
        <form class="cari" action="/cariRapb" method="GET">
          <input type="text" name="cari" placeholder="Cari......" value="{{ old('cari') }}">
          <input type="submit" value="CARI">
        </form>

            <button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Add New</button>
        {{-- <table class="table table-striped" id="mytable">
          <thead>
            <tr>
              <th>kode_induk</th>
              <th>jenis_anggaran</th>
              <th>jenis_id</th>
              <th>kode_sub</th>
              <th>rincian_anggaran</th> 
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($jenisanggaran as $RAPB) 
            <tr>
              <td>{{$RAPB->kode_induk}}</td>
              <td>{{$RAPB->jenis_anggaran}}</td>
               <td>{{$RAPB->rincian_anggarans->id}}</td>
              <td>{{$RAPB->kode_sub}}</td>
              <td>{{$RAPB->rincian_anggaran}}</td> 
           
              <td>                        
                <a href="/rapb/edit/{{ $RAPB->id }}" class="btn btn-sm btn-info">Edit</a>
                <a href="/rapb/hapus/{{ $RAPB->id }}" class="btn btn-sm btn-danger btn-sm">Delete</a>
              </td> 
            </tr>
            @endforeach                        
          </tbody>
        </table>
         --}}

      </div>

      <!-- Modal Add Produk-->
      <form action="/store" method="POST">
        {{ csrf_field() }}
        
             <div class="body">
                
                
                <div class="form-group">
                  <input type="text" id="kode_induk" name="kode_induk" class="form-control" placeholder="kode_induk" required>
                </div>
                <div class="form-group">
                   <input type="text" id="jenis_anggaran" name="jenis_anggaran" class="form-control" placeholder="jenis_anggaran" required>
               </div>

               {{-- <div class="form-group">
                <input type="text" id="jenis_anggaran_id" name="jenis_anggaran_id" class="form-control" placeholder="jenis anggaran id" required>
            </div>
               
               <div class="form-group">
                <input type="text" id="kode_sub" name="kode_sub" class="form-control" placeholder="kode sub" required>
              </div>
              <div class="form-group">
                 <input type="text" id="rincian_anggaran" name="rincian_anggaran" class="form-control" placeholder="rincian anggaran" required>
             </div> --}}
               
 
             
             <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Save</button>
             </div>
           
        </div>
 

    </div>


@endsection