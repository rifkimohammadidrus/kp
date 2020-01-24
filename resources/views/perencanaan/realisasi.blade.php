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
            <li class="breadcrumb-item active"><a href="rab">Realisasi</a></li>
        </ol>

        <div class="container">
            <a class="btn btn-success" href="/perencanaan/realisasi/create_realisasi">Add New</a>
            <div class="row">
                <!--         <div class="col-md-4">
            <form action="/perencanaan/realisasi/search" method="get">
                <div class="input-group">
                    <input type="cari" name="cari" class="form-control" value="{{ old('cari') }}">
                    <span class="input-group-prepend">
                      <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form>
        </div> -->
                <table class="table table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Tanggal</th>
                            <th>Deskripsi Pengeluaran </th>
                            <th>Kode Akun</th>
                            <th>Jumlah</th>
                            <th class="text-center"> Action </th>
                        </tr>
                    </thead>
                    <?php $no = 0;?>
                    @foreach($realisasi as $table)
                    <?php $no++ ;?>
                    <tbody>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$table->tanggal}}</td>
                            <td>{{$table->rincian_anggaran}}</td>
                            <td>{{$table->kode_akun_lengkap}}</td>
                            <td>{{"Rp. ".format_uang($table->jumlah)}}</td>
                            <td>
                                <a class="btn btn-primary" href="/perencanaan/realisasi/edit_realisasi/{{ $table->kode_akun_lengkap }}">Edit</a>
                                {{-- <a class="btn btn-danger"
                                    href="/perencanaan/realisasi/hapus/{{ $table->kode_akun_lengkap }}">Delete</a> --}}
                                <a class="btn btn-danger" href="/perencanaan/realisasi/hapus" data-toggle="modal" data-target="#hapusModal">Delete</a>

                                    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                <a class="btn btn-primary" href="/perencanaan/realisasi/hapus/{{ $table->id }}">Delete</a>
                                            </div>
                        
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <table>
                    <tr>
                        <td>Halaman</td>
                        <td>: {{ $realisasi->currentPage() }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Data</td>
                        <td>: {{ $realisasi->total() }} </td>
                    </tr>
                    <tr>
                        <td>Data Per Halaman</td>
                        <td>: {{ $realisasi->perPage() }} </td>
                    </tr>
                    <tr>
                        <td><b>Total Realisasi</b></td>
                        <td>: <b>{{"Rp. ".format_uang($realisasi->sum('jumlah'))}}</b></td>
                    </tr>
                </table>
            </div>
            {{ $realisasi->links() }}
   
@endsection
