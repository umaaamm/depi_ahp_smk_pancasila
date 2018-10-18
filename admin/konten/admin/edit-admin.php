<?php
include "koneksi/koneksi.php"
?>
<?php
@$id_edit = $_GET['id_edit'];
$query_edit = $koneksi->query("SELECT * FROM tbl_admin where id_admin='" . $id_edit . "' ");
$tampil_edit = $query_edit->fetch_assoc();
?>


<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $query_tambah = $koneksi->query("UPDATE tbl_admin SET username='" . $username . "',password='".$password."', level='" . $level . "' where id_admin = '" . $id_edit . "' ");
    if ($query_tambah) {
        echo '<div class="alert alert-success">Data Berhasil di Edit</div>';
        echo "<meta http-equiv=refresh content=1;url='?m1=admin&m2=admin'>";
    }
}
?>


<?php
$query_combo = $koneksi->query("SELECT * FROM tbl_admin");
?>
<div class="row">
    <!-- left column -->
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">KELOLA ADMIN</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $tampil_edit['username']; ?>"
                               placeholder="Masukkan Username">
                    </div>
                   
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" value="<?= $tampil_edit['password']; ?>"
                               placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control select2" style="width: 100%;" name="level">
                          <option > -- Level --</option>
                          <option  <?php if( $tampil_edit['level']=='admin'){echo "selected"; } ?> value="admin">Admin</option>
                          <option  <?php if( $tampil_edit['level']=='kp'){echo "selected"; } ?> value="kp">Kepala Sekolah</option>
                          
                        </select>
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