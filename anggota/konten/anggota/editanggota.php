<?php
    @$nik=$_GET['id_edit'];
    $query_edit = $koneksi->query("SELECT * from tbl_anggota where nik='".$nik."'");
    $tampil_edit = $query_edit->fetch_assoc();
?>
<?php
if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $query_tambah = $koneksi->query("UPDATE tbl_anggota SET nik='" . $nik . "',nama='" . $nama . "',alamat='" . $alamat . "',password='" . $password . "',email='" . $email . "' where nik='".$nik."' ");
    echo '<div class="alert alert-success">Data Berhasil di Edit</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=anggota&m2=anggota'>";
}
?>
<div class="row">
    <!-- left column -->
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Anggota</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['nik']?>" name="nik" placeholder="Masukkan NIK" readonly>
                    </div>
                     <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['nama']?>" name="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" placeholder="Alamat" name="alamat"><?=$tampil_edit['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['password']?>" name="password" placeholder="Masukkan Password">
                    </div>
                     <div class="form-group">
                        <label>E-Mail</label>
                        <input type="email" class="form-control" value="<?=$tampil_edit['email']?>" name="email" placeholder="Masukkan Email">
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                    </div>
            </form>
        </div>
    </div>
</div>