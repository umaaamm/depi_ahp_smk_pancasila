<?php
include "koneksi/koneksi.php"
?>
<?php
@$id_edit = $_GET['id_edit'];
$query_edit = $koneksi->query("SELECT * FROM tb_kriteria where kode_kriteria='" . $id_edit . "' ");
$tampil_edit = $query_edit->fetch_assoc();
?>


<?php
if (isset($_POST['submit'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    
    $query_tambah = $koneksi->query("UPDATE tb_kriteria SET kode_kriteria='".$kode."',nama_kriteria='" . $nama . "' where kode_kriteria = '" . $id_edit . "' ");
    if ($query_tambah) {
        echo '<div class="alert alert-success">Data Berhasil di Edit</div>';
        echo "<meta http-equiv=refresh content=1;url='?m1=kriteria&m2=kriteria'>";
    }
}
?>


<?php
$query_combo = $koneksi->query("SELECT * FROM tb_kriteria");
?>
<div class="row">
    <!-- left column -->
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Kelola Kriteria</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
                <div class="box-body">
                   <div class="form-group">
                        <label>Kode Kriteria</label>
                        <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Kriteria" value="<?= $tampil_edit['kode_kriteria']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Kriteria</label>
                        <input type="text" class="form-control" name="nama" value="<?= $tampil_edit['nama_kriteria']; ?>"
                               placeholder="Masukkan Nama">
                    </div>
                   
                </div>
                <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>