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
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="cari" placeholder="Search" value="{{ old('cari') }}">
            <button class="btn btn-success my-2 my-sm-0" type="submit" value="CARI">Cari</button>
        </div>
        </form>

            <button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Add New</button>
        <table class="table table-striped" id="mytable">
          <thead>
            <tr>
              <th>Kode Akun</th>
              <th>Kategori</th>
              <th>Sub Kode Akun</th>
              <th>Tahun Akademik</th>
              <th>Semester</th>
              <th>Jumlah Mahasiswa</th>
              <th>Jumlah SKS/MK</th>
              <th>Besarnya</th>
              <th>Jumlah 100%</th>
              <th>Jumlah 90%</th>
              <th>Kode Akun Lengkap</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rapb as $RAPB) 
            <tr>
              <td>{{$RAPB->kode_akun_rapb}}</td>
              <td>{{$RAPB->kategori_rapb}}</td>
              <td>{{$RAPB->sub_kode_rapb}}</td>
              <td>{{$RAPB->tahun_akademik}}</td>
              <td>{{$RAPB->semester}}</td>
              <td>{{$RAPB->jumlah_mahasiswa}}</td>
              <td>{{$RAPB->jumlah_sks}}</td>
              <td>{{"Rp. ".format_uang($RAPB->besarnya)}}</td>
              <td>{{"Rp. ".format_uang($RAPB->jumlah_100)}}</td>
              <td>{{"Rp. ".format_uang($RAPB->jumlah_90)}}</td>
              <td>{{$RAPB->kode_akun_lengkap_rapb}}</td>
              <td>                        
                  <a class="btn btn-primary" href="/editRapb/{{ $RAPB->kode_akun_lengkap_rapb }}">Edit</a>
                  <a class="btn btn-danger" href="/deleteRapb" data-toggle="modal" data-target="#deleteModal">Delete</a>
              </td>
            </tr>
            @endforeach                  
          </tbody>
        </table>
        <table>
            <tr>
                <td><b>Total 100%</b></td>
            <td>: <b>{{"Rp. ".format_uang($rapb->sum('jumlah_100'))}}</b></td>
            </tr>
            <tr>
                <td><b>Total 90%</b></td>
            <td>: <b>{{"Rp. ".format_uang($rapb->sum('jumlah_90'))}}</b></td>
            </tr>
            <tr>
                <td>Halaman</td>
                <td>: {{ $rapb->currentPage() }}</td>
            </tr>
            <tr>
                <td>Jumlah Data</td>
                <td>: {{ $rapb->total() }} </td>
            </tr>
            <tr>
                <td>Data Per Halaman</td>
                <td>: {{ $rapb->perPage() }} </td>
            </tr>
            
        </table>


        {{ $rapb->links() }}
      </div>

      <!-- Modal Add Produk-->
      <form action="/saverapb" method="POST">
        {{ csrf_field() }}
        <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add New RAPB</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                <div class="form-group">
                    <p class="form-control">Kode Akun
                        <select onclick="typeC()" class="kode_akun_rapb" id="kode_akun_rapb" name='kode_akun_rapb'>
                            <option value='01'>01</option>
                            <option value='02'>02</option>
                            <option value='03'>03</option>
                            <option value='04'>04</option>
                            <option value='05'>05</option>
                            <option value='06'>06</option>
                            <option value='07'>07</option>
                            <option value='08'>08</option>
                            <option value='09'>09</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
                            <option value='13'>13</option>
                        </select>
                    </p>
                    <input type="text" id="typeCOut1" name="kategori_rapb" hidden="true">
                    <input class="form-control" id="typeCOut2" type="text" name="kategori_rapb" disabled="true">                                 
                </div>
                
                <div class="form-group">
                  <input type="text" id="sub_kode_rapb" name="sub_kode_rapb" class="form-control" placeholder="Sub Kode" required>
                </div>
                <div class="form-group">
                  <input type="text" id="tahun_akademik" name="tahun_akademik" class="form-control" placeholder="Tahun Akadmeik" required>
                </div>
                <div class="form-group">
                   <input type="text" id="semester" name="semester" class="form-control" placeholder="Semester" required>
               </div>
               <div class="form-group">
                   <input type="text" id="jumlah_mahasiswa" name="jumlah_mahasiswa" class="form-control" placeholder="Jumlah Mahasiswa" required>
               </div>
               <div class="form-group">
                   <input type="text" id="jumlah_sks" name="jumlah_sks" class="form-control" placeholder="Jumlah SKS" required>
               </div>
               <div class="form-group">
                   <input type="text" id="besarnya" name="besarnya" class="form-control" placeholder="Besarnya" required>
               </div>
 
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Save</button>
             </div>
           </div>
         </div>
        </div>
     </form>

     <!-- Modal Update Produk-->
       <form action="/update" method="post">
           <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit RAPB</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                      <input type="text" name="product_name" class="form-control product_name" placeholder="Product Name" required>
                  </div>
     
                  <div class="form-group">
                      <input type="text" name="product_price" class="form-control price" placeholder="Price" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="id" class="product_id">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </div>
           </div>
      </form>
 
      <!-- Delete Modal-->
      @foreach ($rapb as $data)
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">

                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Are You Sure want to Delete it?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">Click "Delete" if You want to Delete it</div>
                  <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-primary" href="/deleteRapb/{{ $data->id_rapb }}">Delete</a>
                  </div>

              </div>
          </div>
      </div>
      @endforeach

    </div>


@endsection