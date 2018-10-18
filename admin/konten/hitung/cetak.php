<!-- ?php include "koneksi/koneksi.php" ?> -->
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