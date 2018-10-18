
<div class="row">
<div class="col-md-12">
    <?php
    // $query= $koneksi->query("SELECT distinct tbl_anggota.nik,tbl_anggota.nama,tbl_anggota.alamat,tbl_anggota.email,
    //     tbl_pengaduan.kode_pengaduan,tbl_pengaduan.tanggal as tanggal_pengaduan,tbl_pengaduan.isi as isi_pengaduan,
    //     tbl_tanggapan.isi as isi_tanggapan,tbl_tanggapan.tanggal as tanggal_tanggapan FROM tbl_anggota left join tbl_pengaduan on tbl_anggota.nik =tbl_pengaduan.nik left join tbl_tanggapan where tbl_pengaduan.kode_pengaduan =tbl_tanggapan.kode_pengaduan ");
    $query=$koneksi->query("SELECT tbl_anggota.nik,tbl_anggota.nama,tbl_anggota.alamat,tbl_anggota.email,tbl_pengaduan.kode_pengaduan,tbl_pengaduan.tanggal as tanggal_pengaduan,tbl_pengaduan.isi as isi_pengaduan,tbl_tanggapan.isi as isi_tanggapan,tbl_tanggapan.tanggal as tanggal_tanggapan,tbl_tanggapan.kode_tanggapan FROM tbl_pengaduan right JOIN tbl_anggota on tbl_anggota.nik = tbl_pengaduan.nik right JOIN tbl_tanggapan on tbl_pengaduan.kode_pengaduan = tbl_tanggapan.kode_pengaduan where tbl_anggota.nik='".$_SESSION['nik']."' ");
?>

    <div class="box box-primary">
        <div class="box-header with border">
            <h3 class="box-title">List Tanggapan</h3>
        </div>

        <div class="box-body">
            <table id="example3" class="table table-bordered table-striped">
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
                    <th>Tanggal Tanggapan</th>
                    <th>Isi Tanggapan</th>
                    
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
                        <td><?= $tampil['tanggal_pengaduan'] ?></td>
                        <td><?= $tampil['isi_pengaduan'] ?></td>
                        <td><?= $tampil['tanggal_tanggapan'] ?></td>
                        <td><?= $tampil['isi_tanggapan'] ?></td>
                        
                    </tr>

                <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

</div>