
<?php
@$id_delete = $_GET['id_delete'];
if(!empty($id_delete)) {
    $query_hapus = $koneksi->query("DELETE FROM tbl_pengaduan where kode_pengaduan='" . $id_delete . "' ");
    echo '<div class="alert alert-success">Data Konsumen Berhasil di Hapus</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=pengaduan&m2=datapengaduan'>";
}
?>
<div class="row">
<div class="col-md-12">
    <?php
    $query = $koneksi->query("SELECT tbl_anggota.*,tbl_pengaduan.* FROM tbl_pengaduan,tbl_anggota where tbl_anggota.nik = tbl_pengaduan.nik");
    
    ?>

    <div class="box box-primary">
        <div class="box-header with border">
            <h3 class="box-title">Data Pengaduan</h3>
        </div>

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pengaduan</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                     <th>Email</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Isi Pengaduan</th>
                    <th>Action</th>
                </tr>
                </thead>

                <?php
                while ($tampil = $query->fetch_assoc()) {
                    @$a++;
                    ?>
                    <tr>
                        <td><?= $a ?></td>
                        <td><?= $tampil['kode_pengaduan'] ?></td>
                        <td><?= $tampil['nik'] ?></td>
                        <td><?= $tampil['nama'] ?></td>
                        <td><?= $tampil['alamat'] ?></td>
                        <td><?= $tampil['email'] ?></td>
                        <td><?= $tampil['tanggal'] ?></td>
                        <td><?= $tampil['isi'] ?></td>
                        <td><a href="javascript:;" data-id="<? echo $tampil['kode_pengaduan'] ?>" data-toggle="modal"
                               data-target="#modal-konfirmasi" class="btn btn-success btn-danger fa fa-trash"></a>&nbsp;<a
                                    href="
						?m1=pengaduan&m2=editdatapengaduan&id_edit=<?= $tampil['kode_pengaduan'] ?>" class="
						btn btn-success btn-warning fa fa-edit" alt="Tanggapi"></a></td>
                    </tr>

                <?php } ?>
                </tbody>

            </table>
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
                        <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>