<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href={{url('assets1/logo-amik.png')}}>
    <title>AMIK GARUT</title>

    <!-- Custom fonts for this template-->
    <link href={{ url('assets1/vendor/fontawesome-free/css/all.min.css')}} rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href={{ url('assets1/vendor/datatables/dataTables.bootstrap4.css')}} rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href={{ url('assets1/css/sb-admin.css')}} rel="stylesheet">
    <link rel="stylesheet" href={{ url('css/rab.css')}}>

    <link rel="stylesheet" href={{ url('css/style.css')}}>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <style>
  .navbar{
    background-color: #330033;
}
.navbar-nav{
    background-color: #330033;
}
.hidden-xs{
    color:white;
}
.fas .fa-user-circle .fa-fw{
    color:white;
}

.modal-footer{
    color: #330033;
}
</style>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand static-top">
        <img src="assets1/Logo.png" class="logo" alt="Logo">
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                    <span class="hidden-xs">{{auth()->user()->name}}</span>
                </a>
                
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/changePassword">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>

    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/index">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/rapb">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>RAPB</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/rab">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>RAB</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/anggaran">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Anggaran</span>
                </a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="/amprahan">Amprahan</a>
                    <a class="dropdown-item" href="/perencanaan/realisasi">Realisasi</a>
                    
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/mutasi">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Mutasi</span></a>
            </li>
        </ul>


        <!-- /.content-wrapper -->
        @yield('conten')
        @yield('body')

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <strong>Copyright &copy; Akademi Manajemen Informatika dan Komputer</a>.</strong> All rights
                reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript-->
    <script src={{ url('assets1/vendor/jquery/jquery.min.js')}}></script>
    <script src={{ url('assets1/vendor/bootstrap/js/bootstrap.bundle.min.js')}}></script>

    <!-- Core plugin JavaScript-->
    <script src={{ url('assets1/vendor/jquery-easing/jquery.easing.min.js')}}></script>

    <!-- Page level plugin JavaScript-->
    <script src={{ url('assets1/vendor/chart.js/Chart.min.js')}}></script>
    <script src={{ url('assets1/vendor/datatables/jquery.dataTables.js')}}></script>
    <script src={{ url('assets1/vendor/datatables/dataTables.bootstrap4.js')}}></script>

    <!-- Custom scripts for all pages-->
    <script src={{ url('assets1/js/sb-admin.min.js')}}></script>

    <!-- Demo scripts for this page-->
    <script src={{ url('assets1/js/demo/datatables-demo.js')}}></script>
    <script src={{ url('assets1/js/demo/chart-area-demo.js')}}></script>
    <script type="text/javascript">
        function typeB(){
            var getType = document.getElementById("kode_akun_rab").value;
            if(getType=="01"){
                document.getElementById('typeBOut1').value="Gaji & Intensif";
                document.getElementById('typeBOut2').value="Gaji & Intensif";
            }else if(getType=="02"){
                document.getElementById('typeBOut1').value="Rapat/Penugasan Dinas";
                document.getElementById('typeBOut2').value="Rapat/Penugasan Dinas";
            }else if(getType=="03"){
                document.getElementById('typeBOut1').value="Intensif Jasa Konsep & Teknis";
                document.getElementById('typeBOut2').value="Intensif Jasa Konsep & Teknis";
            }else if(getType=="04"){
                document.getElementById('typeBOut1').value="Akreditasi/Lisensi/Perijinan";
                document.getElementById('typeBOut2').value="Akreditasi/Lisensi/Perijinan";
            }else if(getType=="05"){
                document.getElementById('typeBOut1').value="Pajak";
                document.getElementById('typeBOut2').value="Pajak";
            }else if(getType=="06"){
                document.getElementById('typeBOut1').value="Asuransi";               
                document.getElementById('typeBOut2').value="Asuransi";
            }else if(getType=="07"){
                document.getElementById('typeBOut1').value="Bantuan/Subsidi/Pendidikan/Beasiswa";               
                document.getElementById('typeBOut2').value="Bantuan/Subsidi/Pendidikan/Beasiswa"; 
            }else if(getType=="08"){
                document.getElementById('typeBOut1').value="Bantuan Sosial";               
                document.getElementById('typeBOut2').value="Bantuan Sosial"; 
            }else if(getType=="09"){
                document.getElementById('typeBOut1').value="Pemeliharaan/Reparasi/Renovasi";               
                document.getElementById('typeBOut2').value="Pemeliharaan/Reparasi/Renovasi"; 
            }else if(getType=="10"){
                document.getElementById('typeBOut1').value="Investasi";               
                document.getElementById('typeBOut2').value="Investasi"; 
            }else if(getType=="11"){
                document.getElementById('typeBOut1').value="Pengembalian Hutang Usaha";               
                document.getElementById('typeBOut2').value="Pengembalian Hutang Usaha"; 
            }else if(getType=="12"){
                document.getElementById('typeBOut1').value="Penelitian dan Pengabdian";               
                document.getElementById('typeBOut2').value="Penelitian dan Pengabdian"; 
            }else if(getType=="13"){
                document.getElementById('typeBOut1').value="Tamu Dinas";               
                document.getElementById('typeBOut2').value="Tamu Dinas"; 
            }else if(getType=="14"){
                document.getElementById('typeBOut1').value="Penerimaan Mahasiswa Baru";               
                document.getElementById('typeBOut2').value="Penerimaan Mahasiswa Baru"; 
            }else if(getType=="15"){
                document.getElementById('typeBOut1').value="Rumah Tangga";               
                document.getElementById('typeBOut2').value="Rumah Tangga"; 
            }else if(getType=="16"){
                document.getElementById('typeBOut1').value="Kegiatan Keagamaan";               
                document.getElementById('typeBOut2').value="Kegiatan Keagamaan"; 
            }else if(getType=="17"){
                document.getElementById('typeBOut1').value="Seminar/Workshop Kerjasama";               
                document.getElementById('typeBOut2').value="Seminar/Workshop Kerjasama"; 
            }else if(getType=="18"){
                document.getElementById('typeBOut1').value="Kesejahteraan Internal";               
                document.getElementById('typeBOut2').value="Kesejahteraan Internal"; 
            }else if(getType=="19"){
                document.getElementById('typeBOut1').value="Kegiatan Transitoris";               
                document.getElementById('typeBOut2').value="Kegiatan Transitoris"; 
            }else{
                document.getElementById('typeBOut1').value="Cadangan Anggaran";
                document.getElementById('typeBOut2').value="Cadangan Anggaran";
            }
        }        
    </script> 
    
    <script type="text/javascript">
        $(function(){
         $(".datepicker").datepicker({
             format: 'yyyy-mm-dd',
             autoclose: true,
             todayHighlight: true,
         });
         $("#from_date").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#to_date").datepicker('setStartDate', startDate);
        if($("#from_date").val() > $("#to_date").val()){
          $("#to_date").val($("#from_date").val());
        }
    });
        });
       </script>

<!-- Anggaran -->
<script type="text/javascript">
    function typeA(){
        var getType = document.getElementById("kode_akun").value;
        if(getType=="01"){
            document.getElementById('typeAOut1').value="Gaji & Intensif";
            document.getElementById('typeAOut2').value="Gaji & Intensif";
        }else if(getType=="02"){
            document.getElementById('typeAOut1').value="Rapat/Penugasan Dinas";
            document.getElementById('typeAOut2').value="Rapat/Penugasan Dinas";
        }else if(getType=="03"){
            document.getElementById('typeAOut1').value="Intensif Jasa Konsep & Teknis";
            document.getElementById('typeAOut2').value="Intensif Jasa Konsep & Teknis";
        }else if(getType=="04"){
            document.getElementById('typeAOut1').value="Akreditasi/Lisensi/Perijinan";
            document.getElementById('typeAOut2').value="Akreditasi/Lisensi/Perijinan";
        }else if(getType=="05"){
            document.getElementById('typeAOut1').value="Pajak";
            document.getElementById('typeAOut2').value="Pajak";
        }else if(getType=="06"){
            document.getElementById('typeAOut1').value="Asuransi";               
            document.getElementById('typeAOut2').value="Asuransi";
        }else if(getType=="07"){
            document.getElementById('typeAOut1').value="Bantuan/Subsidi/Pendidikan/Beasiswa";               
            document.getElementById('typeAOut2').value="Bantuan/Subsidi/Pendidikan/Beasiswa"; 
        }else if(getType=="08"){
            document.getElementById('typeAOut1').value="Bantuan Sosial";               
            document.getElementById('typeAOut2').value="Bantuan Sosial"; 
        }else if(getType=="09"){
            document.getElementById('typeAOut1').value="Pemeliharaan/Reparasi/Renovasi";               
            document.getElementById('typeAOut2').value="Pemeliharaan/Reparasi/Renovasi"; 
        }else if(getType=="10"){
            document.getElementById('typeAOut1').value="Investasi";               
            document.getElementById('typeAOut2').value="Investasi"; 
        }else if(getType=="11"){
            document.getElementById('typeAOut1').value="Pengembalian Hutang Usaha";               
            document.getElementById('typeAOut2').value="Pengembalian Hutang Usaha"; 
        }else if(getType=="12"){
            document.getElementById('typeAOut1').value="Penelitian dan Pengabdian";               
            document.getElementById('typeAOut2').value="Penelitian dan Pengabdian"; 
        }else if(getType=="13"){
            document.getElementById('typeAOut1').value="Tamu Dinas";               
            document.getElementById('typeAOut2').value="Tamu Dinas"; 
        }else if(getType=="14"){
            document.getElementById('typeAOut1').value="Penerimaan Mahasiswa Baru";               
            document.getElementById('typeAOut2').value="Penerimaan Mahasiswa Baru"; 
        }else if(getType=="15"){
            document.getElementById('typeAOut1').value="Rumah Tangga";               
            document.getElementById('typeAOut2').value="Rumah Tangga"; 
        }else if(getType=="16"){
            document.getElementById('typeAOut1').value="Kegiatan Keagamaan";               
            document.getElementById('typeAOut2').value="Kegiatan Keagamaan"; 
        }else if(getType=="17"){
            document.getElementById('typeAOut1').value="Seminar/Workshop Kerjasama";               
            document.getElementById('typeAOut2').value="Seminar/Workshop Kerjasama"; 
        }else if(getType=="18"){
            document.getElementById('typeAOut1').value="Kesejahteraan Internal";               
            document.getElementById('typeAOut2').value="Kesejahteraan Internal"; 
        }else if(getType=="19"){
            document.getElementById('typeAOut1').value="Kegiatan Transitoris";               
            document.getElementById('typeAOut2').value="Kegiatan Transitoris"; 
        }else{
            document.getElementById('typeAOut1').value="Cadangan Anggaran";
            document.getElementById('typeAOut2').value="Cadangan Anggaran";
        }
    }        
</script>

<!-- Rapb -->
<script type="text/javascript">
    function typeC(){
        var getType = document.getElementById("kode_akun_rapb").value;
        if(getType=="01"){
            document.getElementById('typeCOut1').value="Dana Bangunan";
            document.getElementById('typeCOut2').value="Dana Bangunan";
        }else if(getType=="02"){
            document.getElementById('typeCOut1').value="Biaya Tetap";
            document.getElementById('typeCOut2').value="Biaya Tetap";
        }else if(getType=="03"){
            document.getElementById('typeCOut1').value="Biaya Sks";
            document.getElementById('typeCOut2').value="Biaya Sks";
        }else if(getType=="04"){
            document.getElementById('typeCOut1').value="Biaya Praktikum";
            document.getElementById('typeCOut2').value="Biaya Praktikum";
        }else if(getType=="05"){
            document.getElementById('typeCOut1').value="Registrasi";
            document.getElementById('typeCOut2').value="Registrasi";
        }else if(getType=="06"){
            document.getElementById('typeCOut1').value="Perpustakaan";               
            document.getElementById('typeCOut2').value="Perpustakaan";
        }else if(getType=="07"){
            document.getElementById('typeCOut1').value="Kemahasiswaan";               
            document.getElementById('typeCOut2').value="Kemahasiswaan"; 
        }else if(getType=="08"){
            document.getElementById('typeCOut1').value="Kerja Praktek";               
            document.getElementById('typeCOut2').value="Kerja Praktek"; 
        }else if(getType=="09"){
            document.getElementById('typeCOut1').value="Tugas Akhir";               
            document.getElementById('typeCOut2').value="Tugas Akhir"; 
        }else if(getType=="10"){
            document.getElementById('typeCOut1').value="Biaya PBMA";               
            document.getElementById('typeCOut2').value="Biaya PBMA"; 
        }else if(getType=="11"){
            document.getElementById('typeCOut1').value="Biaya UTS";               
            document.getElementById('typeCOut2').value="Biaya UTS"; 
        }else if(getType=="12"){
            document.getElementById('typeCOut1').value="Biaya UAS";               
            document.getElementById('typeCOut2').value="Biaya UAS"; 
        }else{
            document.getElementById('typeCOut1').value="Biaya Wisuda";               
            document.getElementById('typeCOut2').value="Biaya Wisuda"; 
        }
    }        
</script>

</body>

</html>
