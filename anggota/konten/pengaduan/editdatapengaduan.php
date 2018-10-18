<?php
@$id_edit = $_GET['id_edit'];
$query_edit = $koneksi->query("SELECT tbl_pengaduan.kode_pengaduan,tbl_pengaduan.tanggal,tbl_pengaduan.isi, tbl_anggota.nik,tbl_anggota.nama,tbl_anggota.alamat FROM tbl_anggota,tbl_pengaduan where tbl_pengaduan.nik =tbl_anggota.nik and tbl_pengaduan.kode_pengaduan='".$id_edit."' ");
$tampil_edit = $query_edit->fetch_assoc();
?>

<?php
if (isset($_POST['submit'])) {
    $kode_pengaduan=$_POST['kode_pengaduan'];
    $nik = $_POST['nik'];
    $isi = $_POST['isi_pengaduan'];
    $query_tambah = $koneksi->query("UPDATE tbl_pengaduan SET kode_pengaduan='".$kode_pengaduan."',nik='" . $nik . "',isi='" . $isi . "' where kode_pengaduan='".$kode_pengaduan."' ");
    echo '<div class="alert alert-success">Data Pengaduan Berhasil diedit</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=pengaduan&m2=pengaduananggota'>";
}
?>
<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Pengaduan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
          <div class="row">
            <form role="form" action="" method="post">
            <div class="col-md-4">
              <div class="form-group">
                    <label>NIK</label>
                    <input type="hidden" name="kode_pengaduan" value="<?= $tampil_edit['kode_pengaduan'] ?>" readonly>
                    <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK anda" value="<?= $tampil_edit['nik'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda" value="<?= $tampil_edit['nama'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="5" name="alamat" placeholder="Masukan Alamat Anda" readonly><?= $tampil_edit['alamat'] ?></textarea>
                    </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
              <div class="form-group">
                    <label>Pengaduan Anda</label>
                    <textarea id="editor1" name="isi_pengaduan" rows="10" cols="80"> <?php echo $tampil_edit['isi'] ?>         
                    </textarea>
                    </div>
              <!-- /.form-group -->
            </div>
          
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
    </div>