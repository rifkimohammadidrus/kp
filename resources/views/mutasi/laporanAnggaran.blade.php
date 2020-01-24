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
                
                <li class="breadcrumb-item active"><a href="mutasi">Mutasi</a></li>
                <li class="breadcrumb-item active">Anggaran</li>
            </ol>
    
        <div class="container">
            <form  class="cari" action="/laporanAnggaran" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="cari" placeholder="Search" value="{{ old('cari') }}">
                    <button class="btn btn-success my-2 my-sm-0" type="submit" value="CARI">Cari</button>
                </div>
            </form>
                <table class="table table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Akun Induk</th>
                            <th>Jenis Anggaran</th>
                            <th>Sub Kode Akun</th>
                            <th>Rincian Anggaran</th>
                            <th>Kode Akun Lengkap</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1 @endphp
                        @foreach($anggaran as $ANGGARAN) 
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$ANGGARAN->kode_akun}}</td>
                            <td>{{$ANGGARAN->jenis_anggaran}}</td>
                            <td>{{$ANGGARAN->sub_kode_akun}}</td>
                            <td>{{$ANGGARAN->rincian_anggaran}}</td>
                            <td>{{$ANGGARAN->kode_akun_lengkap}}</td>
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
        </div>
    <div class="container">
        <button><a href="anggaran-pdf">Cetak</a> </button>
    </div>
</div>

@endsection