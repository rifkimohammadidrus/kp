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
                <li class="breadcrumb-item active"><a href="rab">RAB</a></li>
            </ol>
    
    <div class="container">
        <form class="cari" action="/cariRab" method="GET">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="cari" placeholder="Search" value="{{ old('cari') }}">
            <button class="btn btn-success my-2 my-sm-0" type="submit" value="CARI">Cari</button>
        </div>
        </form>

            <button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Add New</button>
        <table class="table table-striped" id="mytable">
          <thead>
            <tr>
              <th>Kode Akun Induk</th>
              <th>Jenis Mata Anggaran</th>
              <th>Tahun Akademik</th>
              <th>Sub Kode Akun</th>
              <th>Rincian Anggaran</th>
              <th>Jumlah Mata Angg</th>
              <th>Kode Akun Lengkap</th>
              <th>Jumlah</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rab as $RAB) 
            <tr>
              <td>{{$RAB->kode_akun_rab}}</td>
              <td>{{$RAB->jenis_anggaran_rab}}</td>
              <td>{{$RAB->tahun_akademik_rab}}</td>
              <td>{{$RAB->sub_kode_akun_rab}}</td>
              <td>{{$RAB->rincian_anggaran_rab}}</td>
              <td>{{"Rp. ".format_uang($RAB->jumlah_mata_anggaran)}}</td>
              <td>{{$RAB->kode_akun_lengkap_rab}}</td>
              <td>{{"Rp. ".format_uang($RAB->jumlah_total)}}</td>
              <td>
                <a class="btn btn-primary" href="/editRab/{{ $RAB->kode_akun_lengkap_rab }}">Edit</a>
                <a class="btn btn-danger" href="/deleteRab" data-toggle="modal" data-target="#deleteModal">Delete</a>
              </td>
            </tr>
            @endforeach                        
          </tbody>
        </table>
        <table>
            <tr>
                <td><b>Total</b></td>
            <td>: <b>{{"Rp. ".format_uang($rab->sum('jumlah_total'))}}</b></td>
            </tr>
            <tr>
                <td>Halaman</td>
                <td>: {{ $rab->currentPage() }}</td>
            </tr>
            <tr>
                <td>Jumlah Data</td>
                <td>: {{ $rab->total() }} </td>
            </tr>
            <tr>
                <td>Data Per Halaman</td>
                <td>: {{ $rab->perPage() }} </td>
            </tr>
        </table>

        {{ $rab->links() }}
      </div>

      <!-- Modal Add Produk-->
      <form action="/saverab" method="POST">
        {{ csrf_field() }}
        <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add New RAB</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                <div class="form-group">
                <p class="form-control">Kode Akun Induk
                  <select onclick="typeB()" class="kode_akun_rab" id="kode_akun_rab" name='kode_akun_rab'>
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
                      <option value='14'>14</option>
                      <option value='15'>15</option>
                      <option value='16'>16</option>
                      <option value='17'>17</option>
                      <option value='18'>18</option>
                      <option value='19'>19</option>
                      <option value='20'>20</option>
                  </select>
              </p>
              <input type="text" id="typeBOut1" name="jenis_anggaran_rab" hidden="true">
              <input class="form-control" id="typeBOut2" type="text" name="jenis_anggaran_rab" disabled="true">
          </div>
               <div class="form-group">
                    <input type="text" id="tahun_akademik_rab" name="tahun_akademik_rab" class="form-control" placeholder="Tahun Akademik" required>
               </div>
               <div class="form-group">
                   <input type="text" id="sub_kode_akun_rab" name="sub_kode_akun_rab" class="form-control" placeholder="Sub Kode Akun" required>
               </div>
               <div class="form-group">
                   <input type="text" id="rincian_anggaran_rab" name="rincian_anggaran_rab" class="form-control" placeholder="Rincian Anggaran" required>
               </div>
               <div class="form-group">
                   <input type="text" id="jumlah_mata_anggaran" name="jumlah_mata_anggaran" class="form-control" placeholder="Jumlah Mata Anggaran" required>
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
                  <h5 class="modal-title" id="exampleModalLabel">Edit RAB</h5>
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
      @foreach ($rab as $data)
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
                      <a class="btn btn-primary" href="/deleteRab/{{ $data->id }}">Delete</a>
                  </div>

              </div>
          </div>
      </div>
      @endforeach
 
        </div>
    </div>


@endsection