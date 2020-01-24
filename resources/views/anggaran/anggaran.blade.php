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
            <li class="breadcrumb-item active">Anggaran</li>
        </ol>

        <div class="container">
            <form class="cari" action="/carianggaran" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="cari" placeholder="Search" value="{{ old('cari') }}">
                    <button class="btn btn-success my-2 my-sm-0" type="submit" value="CARI">Cari</button>
                </div>
            </form>
            <button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Add New</button>
            <table class="table table-striped" id="mytable">
                <thead>
                    <tr>
                        <th>Tahun Akademik</th>
                        <th>Kode Akun Induk</th>
                        <th>Jenis Anggaran</th>
                        <th>Sub Kode Akun</th>
                        <th>Rincian Anggaran</th>
                        <th>Kode Akun Lengkap</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggaran as $ANGGARAN)
                    <tr>
                        <td>{{$ANGGARAN->tahun_akademik}}</td>
                        <td>{{$ANGGARAN->kode_akun}}</td>
                        <td>{{$ANGGARAN->jenis_anggaran}}</td>
                        <td>{{$ANGGARAN->sub_kode_akun}}</td>
                        <td>{{$ANGGARAN->rincian_anggaran}}</td>
                        <td>{{$ANGGARAN->kode_akun_lengkap}}</td>
                        <td>
                            <a class="btn btn-primary" href="/ubah/{{ $ANGGARAN->kode_akun_lengkap }}">Edit</a>
                            <a class="btn btn-danger" href="/delete" data-toggle="modal" data-target="#deleteModal">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table>
                <tr>
                    <td>Halaman</td>
                    <td>: {{ $anggaran->currentPage() }}</td>
                </tr>
                <tr>
                    <td>Jumlah Data</td>
                    <td>: {{ $anggaran->total() }} </td>
                </tr>
                <tr>
                    <td>Data Per Halaman</td>
                    <td>: {{ $anggaran->perPage() }} </td>
                </tr>
            </table>

            {{ $anggaran->links() }}
        </div>

        <!-- Modal Add Produk-->
        <form action="/saveanggaran" method="POST">
            {{ csrf_field() }}
            <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Anggaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <p class="form-control">Kode Akun Induk
                                    <select onclick="typeA()" class="kode_akun" id="kode_akun" name='kode_akun'>
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
                                <input type="text" id="typeAOut1" name="jenis_anggaran" hidden="true">
                                <input class="form-control" id="typeAOut2" type="text" name="jenis_anggaran"
                                    disabled="true">
                            </div>

                            <div class="form-group">
                                <input type="text" id="tahun_akademik" name="tahun_akademik" class="form-control"
                                    placeholder="Tahun Akademik" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="sub_kode_akun" name="sub_kode_akun" class="form-control"
                                    placeholder="Sub Kode Akun" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="rincian_anggaran" name="rincian_anggaran" class="form-control"
                                    placeholder="Rincian Anggaran" required>
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
        <section class="main-section">
            <!-- Add Your Content Inside -->
            <div class="content">
                <div class="offset-md-2">
                    <!-- Remove This Before You Start -->
                    <div class="modal fade" id="ubahModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Anggaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach($anggaran as $datas)
                                    <form action="/update" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="tahun_akademik"
                                                name="tahun_akademik" hidden="true"
                                                value="{{ $datas->tahun_akademik }}">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="kode_akun" name="kode_akun"
                                                hidden="true" value="{{ $datas->kode_akun }}">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="jenis_anggaran"
                                                name="jenis_anggaran" hidden="true"
                                                value="{{ $datas->jenis_anggaran }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="sub_kode_akun">Sub Kode Akun :</label>
                                            <input type="text" class="form-control" id="sub_kode_akun"
                                                name="sub_kode_akun" value="{{ $datas->sub_kode_akun }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="rincian_anggaran">Rincian Anggaran :</label>
                                            <input type="text" class="form-control" id="rincian_anggaran"
                                                name="rincian_anggaran" value="{{ $datas->rincian_anggaran }}">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="kode_akun_lengkap"
                                                name="kode_akun_lengkap" hidden="true"
                                                value="{{ $datas->kode_akun_lengkap }}">
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="id" class="product_id">
                                            <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Delete Modal-->
        @foreach ($anggaran as $item)
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
                        <a class="btn btn-primary" href="/delete/{{ $item->id }}">Delete</a>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
