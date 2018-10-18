<?php
include "koneksi/koneksi.php"
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Sistem Pendaftaran Siswa Baru| SMK Pancasila Seputih Mataram</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="aset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="aset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="aset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="aset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="aset/dist/css/skins/_all-skins.min.css">
  <!-- <link rel="stylesheet" href="aset/carousel.css"> -->
  <link rel="stylesheet" href="aset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="aset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="aset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="aset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="aset/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">SMK Pancasila</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="./">Home</a></li>
            <li><a href="?m1=daftar&m2=daftar">Pendaftaran <span class="sr-only">(current)</span></a></li>
            <li><a href="?m1=pengumuman&m2=pengumuman">Pengumuman</a></li>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li> -->
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <!-- <input type="text" class="form-control" id="navbar-search-input" placeholder="Search"> -->
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        
<!--                   <p>
                    Alexander Pierce - Web Developer
                    <small>Member since Nov. 2012</small>
                  </p>
                </li> -->
                <!-- Menu Body -->
                <!-- <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                  <!-- /.row -->
                <!-- </li> -->
                                <!-- Menu Footer-->
                <!-- <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li> -->
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Pendaftaran
          <small> SMK Pancasila Seputih Mataram</small>
        </h1>
        <?php if(isset($_GET['m2']) && $_GET['m2']=='daftar'){ ?>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Pendaftaran</a></li>
          <li class="active">Data Diri</li>
        </ol>
      <?php } ?>
      </section>

      <!-- Main content -->
      <section class="content">
        

        <?php
          if (isset($_GET['m2']) && $_GET['m2']=='pengumuman') { ?>
            
             <div class="callout callout-info">
          <h4>Selamat Datang!</h4>

          <p>Silahkan Lihat Pengumuman Hasil.</p>
        </div>
            <?php
          }elseif(isset($_GET['m2']) && $_GET['m2']=='daftar'){
        ?>
<div class="callout callout-info">
          <h4>Selamat Datang!</h4>

          <p>Untuk melakukan pendaftaran, Silahkan anda isi form yang berada dibawah ini.</p>
        </div>
        <?php 
        }
      ?>
       <!--  <div class="callout callout-danger">
          <h4>Warning!</h4>

          <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
            and the content will slightly differ than that of the normal layout.</p>
        </div> -->
        <!-- <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Blank Box</h3>
          </div>
          <div class="box-body">
            The great content goes here
          </div> -->
          <!-- /.box-body -->
        <!-- </div> -->
        <!-- /.box -->

        <?php

  if(empty($_GET['m1']) || empty($_GET['m2']))
  {
    include "beranda.php";
  }
  else
  {
    include "konten/".$_GET['m1']."/".$_GET['m2'].".php";
  }
  ?>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2018 | Depi .</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="aset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="aset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="aset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="aset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="aset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="aset/dist/js/demo.js"></script>
<script src="aset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="aset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="aset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="aset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      "scrollX": true
    })
    $('#example4').DataTable({
      "scrollX": true
    })
    $('#example3').DataTable()
    $('#example5').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
  $('#datepicker').datepicker({
      autoclose: true
    })
  $('#datepicker1').datepicker({
      autoclose: true
    })
  $('#datepicker2').datepicker({
      autoclose: true
    })
</script>
</body>
</html>
