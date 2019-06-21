<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AMIK</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href={{ url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}>
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ url('assets/bower_components/font-awesome/css/font-awesome.min.css')}}>
    <!-- Ionicons -->
    <link rel="stylesheet" href={{ url('assets/bower_components/Ionicons/css/ionicons.min.css')}}>
    <!-- jvectormap -->
    <link rel="stylesheet" href={{ url('assets/bower_components/jvectormap/jquery-jvectormap.css')}}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ url('assets/dist/css/AdminLTE.min.css')}}>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href={{ url('assets/dist/css/skins/_all-skins.min.css')}}>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>S</b>ILK</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Sistem</b>ILK</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{auth()->user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        Admin - AMIK GARUT
                                        <small>Admin Sistem Laporan Keuangan</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">

                                    <div class="col-md-12">
                                        <a href="/logout" class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{auth()->user()->name}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active treeview menu-open">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li class="active"><a href="/dashboard"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-file"></i> <span>Laporan RAPB</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Transitoris</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Non-Transitoris</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-th"></i> <span>RAB</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-th"></i> <span>Perencanaan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-th"></i> <span>Laporan Realisasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-th"></i> <span>Mutasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-th"></i> <span>Info</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="pages/calendar.html">
                            <i class="fa fa-calendar"></i> <span>Calendar</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red">3</small>
                                <small class="label pull-right bg-blue">17</small>
                            </span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Dashboard</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; >Akademi Manajemen Informatika Garut</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src={{ url('assets/bower_components/jquery/dist/jquery.min.js')}}></script>
    <!-- Bootstrap 3.3.7 -->
    <script src={{ url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}></script>
    <!-- FastClick -->
    <script src={{ url('assets/bower_components/fastclick/lib/fastclick.js')}}></script>
    <!-- AdminLTE App -->
    <script src={{ url('assets/dist/js/adminlte.min.js')}}></script>
    <!-- Sparkline -->
    <script src={{ url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}></script>
    <!-- jvectormap  -->
    <script src={{ url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}></script>
    <script src={{ url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}></script>
    <!-- SlimScroll -->
    <script src={{ url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}></script>
    <!-- ChartJS -->
    <script src={{ url('assets/bower_components/chart.js/Chart.js')}}></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src={{ url('assets/dist/js/pages/dashboard2.js')}}></script>
    <!-- AdminLTE for demo purposes -->
    <script src={{ url('assets/dist/js/demo.js')}}></script>
</body>

</html>
