<!-- ?php include "koneksi/koneksi.php" ?> -->
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
  <!-- Morris chart -->
  <link rel="stylesheet" href="aset/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="aset/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="aset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="aset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="aset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="aset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="aset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="aset/plugins/timepicker/bootstrap-timepicker.min.css">
<div class="page-header">
	<h2>Laporan Penerimaan</h2>
</div>
<table class="table table-striped">
            <thead>
<?php


        include 'koneksi/koneksi.php';
        echo '<tr><td> <h6 style="font-weight:bold"><font color="green">Nama </font></h6></td>';
        $query = "SELECT nama_kriteria FROM tb_kriteria order by kode_kriteria";
        $exe = $koneksi->query($query);
        while ($row = $exe->fetch_assoc())
            echo '<td> <h6 style="font-weight:bold"><font color="green"> Nilai ' . $row['nama_kriteria'] . ' </font></h6></td>';

        echo '<td> <h6 style="font-weight:bold"><font color="green"> Score</font></h6></td><td><h6 style="font-weight:bold"><font color="green">Ranking </font></h6></td></td></tr>';

        ?>
        </thead>
        <?php
        $query = "SELECT * FROM tb_hasil a, tbl_pendaftar b where a.id_pendaftar =  b.id_pendaftar order by rangking";
        $exe = $koneksi->query($query);
        while ($row = $exe->fetch_assoc()) {
            echo '<tr>
            <td>' . $row['nama_pendaftar'] . '</td>';
            $query2 = "SELECT * FROM tb_nilai where id_pendaftar='" . $row['id_pendaftar'] . "' order by kode_kriteria";
            $exe2 = $koneksi->query($query2);
            while ($row2 = $exe2->fetch_assoc()) {
                echo '<td>' . $row2['nilai'] . '</td>';
            }
            echo '<td>' . $row['score'] . '</td><td>' . $row['rangking'] . '</td>';
    //         if ($row['status_penerimaan'] == "1") {
    //             echo '<td>' . "Disetujui" . '</td>
             // </tr>';
    //         } else {
    //             echo '<td>' . "Tidak Disetujui" . '</td>
             // </tr>';
    //         }

        }

?>   
</table>

                   <!-- <hr size='1px'> -->

                   <script type="text/javascript">window.print()</script>
                   <script src="aset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="aset/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="aset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="aset/bower_components/raphael/raphael.min.js"></script>
<script src="aset/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="aset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="aset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="aset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="aset/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="aset/bower_components/moment/min/moment.min.js"></script>
<script src="aset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="aset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="aset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="aset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="aset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="aset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="aset/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="aset/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="aset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="aset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="aset/bower_components/Chart.js/Chart.js"></script>
<script src="aset/bower_components/raphael/raphael.min.js"></script>
<script src="aset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="aset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="aset/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->


<script src="aset/js/highcharts.js"></script>

<script src="aset/hapus.js"></script>

<script type="text/javascript">
function angka(e) {
  if (!/^[0-9]+$/.test(e.value)) {
    e.value = e.value.substring(0,e.value.length-1);
  }
}
</script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor2')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<!-- FastClick -->
<script>
  $(function () {
    $('#example1').DataTable({
      "scrollX": true
    })
    $('#example3').DataTable()
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
</script>
</body>
</html>
<?php
// }else{
//     // include "login.php";
// }
?>