@extends('dashboards.app')

@section('conten')


<!-- /.nav-collapse -->
<div id="content-wrapper">
    <!-- /.container-fluid -->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/index">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Perencanaan</li>
        </ol>
        <div class="container">
            <div class="input-group">
            <form class="cari" action="/perencanaan/cari" method="GET">
                <input type="text" name="cari" placeholder="Cari......" value="{{ old('cari') }}">
                <input type="submit" class="btn btn-primary" value="CARI">
            </form>
            </div>
            <button class="btn btn-success" data-toggle="modal" data-target="#modalku">Add
                New</button>
            <table class="table table-bordered table-striped table-hover" id="mytable">
                <thead>
                    <tr>

                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Deskripsi Pengeluaran </th>
                        <th>Kode</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th class="text-center"> Action </th>

                    </tr>
                </thead>
                @foreach($data as $table)
                <tbody>
                    <tr>
                        <td>{{$table->id}}</td>
                        <td>{{$table->tanggal}}</td>
                        <td>{{$table->deskripsi}}</td>
                        <td>{{$table->kode}}</td>
                        <td>Rp.{{$table->debit}}</td>
                        <td>{{$table->kredit}}</td>

                        <td>

                            <a class="btn btn-warning" href="/perencanaan/edit/{{ $table->id }}">Edit</a>
                            <a class="btn btn-danger" href="/perencanaan/hapus/{{ $table->id }}">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <table>
                <tr>
                    <td>Halaman</td>
                    <td>: {{ $data->currentPage() }}</td>
                </tr>
                <tr>
                    <td>Jumlah Data</td>
                    <td>: {{ $data->total() }} </td>
                </tr>
                <tr>
                    <td>Data Per Halaman</td>
                    <td>: {{ $data->perPage() }} </td>
                </tr>
                <tr>
                    <td><b>Jumlah Debit</b></td>
                    <td>:  <b>Rp.{{$data->sum('debit')}}</b></td>
                </tr>
                <tr>
                    <td><b>Total Kredit</b></td>
                    <td>: <b>Rp.{{$data->sum('kredit')}}</b></td>
                </tr>
            </table>
            {{ $data->links() }}
            <div class="pull-right">
            </div>
        </div>
    </div>
    <!--/.content-->
</div>
<!-- Modal Add Produk-->
<form action="/perencanaan/store" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade" id="modalku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="form-group">
                    <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="tanggal" required>
                </div>

                <div class="form-group">
                    <input type="text" id="deskripsi" name="deskripsi" class="form-control"
                        placeholder="Deskripsi Pengeluaran" required>
                </div>

                <div class="form-group">
                    <input type="text" id="kode" name="kode" class="form-control" placeholder="Kode" required>
                </div>

                <div class="form-group">
                    <input type="text" id="debit" name="debit" class="form-control" placeholder="Debit" required>
                </div>

                <div class="form-group">
                    <input type="text" id="kredit" name="kredit" class="form-control" placeholder="Kredit" required>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
