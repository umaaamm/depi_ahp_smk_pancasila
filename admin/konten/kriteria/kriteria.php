<?php
@$id_delete = $_GET['id_delete'];
if (!empty($id_delete)) {
    $query_hapus = $koneksi->query("DELETE FROM tb_kriteria where kode_kriteria='" . $id_delete . "' ");
    echo '<div class="alert alert-success">Data Berhasil di Hapus</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=kriteria&m2=kriteria'>";
}
?>

<?php
if (isset($_POST['submit'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $query_tambah = $koneksi->query("INSERT INTO tb_kriteria (kode_kriteria,nama_kriteria)values ('" . $kode . "','" . $nama . "')");
    echo '<div class="alert alert-success">Data Berhasil di Tambah</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=kriteria&m2=kriteria'>";
}
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
                        <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Kriteria" required>
                    </div>
                     <div class="form-group">
                        <label>Nama Kriteria</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kriteria" required>
                    </div>
                    
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-8">
    <?php
    $query = $koneksi->query("SELECT * FROM tb_kriteria");
    ?>

    <div class="box box-primary">
        <div class="box-header with border">
            <h3 class="box-title">Data Kriteria</h3>
        </div>

        <div class="box-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php
                while ($tampil = $query->fetch_assoc()) {
                    @$a++;
                    ?>

                    <tr>
                        <td><?= $a ?></td>
                        <td><?= $tampil['kode_kriteria'] ?></td>
                        <td><?= $tampil['nama_kriteria'] ?></td>
                        <td><a href="javascript:;" data-id="<? echo $tampil['kode_kriteria'] ?>" data-toggle="modal"
                               data-target="#modal-konfirmasi" class="btn btn-success btn-danger fa fa-trash"></a>&nbsp;<a
                                    href="
						?m1=kriteria&m2=edit-kriteria&id_edit=<?= $tampil['kode_kriteria'] ?>" class="
						btn btn-success btn-warning fa fa-edit"></a></td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>
        </div>
    </div>

    <div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body btn-info">
                    Apakah Anda yakin ingin menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" id="hapus-true-data-kriteria">Hapus</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>

            </div>
        </div>
    </div>
</div>