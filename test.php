</div>
<div class="col-sm-8" style="text-align:center">
    <div align="center"><img src="Images/GGP.png" width="80"/></div>
    <h2 align="center"><font color='green'><b> Selamat Datang <?php echo $_SESSION['login'] ?> </b></font></h2>
    <?php
    include 'Database/koneksi.php';
    $sql = "SELECT COUNT(nama) as jml FROM tb_calonkaryawan left JOIN tb_hasil ON tb_calonkaryawan.kd_pendaftaran=tb_hasil.kd_pendaftaran WHERE score is null";
    $res = mysqli_fetch_row($koneksi->query("SELECT COUNT(nama) as jml FROM tb_calonkaryawan left JOIN tb_hasil ON tb_calonkaryawan.kd_pendaftaran=tb_hasil.kd_pendaftaran WHERE score is null"));

    echo "<h4 class='label label-warning'>" . $res[0] . " Peserta belum diuji</h4>";
    ?>
    <br/>
    <?php
    $sql1 = "SELECT COUNT(kd_pendaftaran) FROM tb_calonkaryawan";
    $res1 = mysqli_fetch_row($koneksi->query($sql1));
    echo "<span class='label label-primary'>" . $res1[0] . " Peserta yang sudah melakukan pendaftaran</span>";
    ?>

    <br/>
    <br/>
    <br/>
    <h4> Laporan Hasil Perhitungan </h4>
    <table border='1' class="table" width="100%">
        <?php
        include "Database/koneksi.php";
        echo '<tr><td> <h6 style="font-weight:bold">Nama </h6></td>';

        $query = "SELECT nama_kriteria FROM tb_kriteria order by kode_kriteria";


        $exe = $koneksi->query("SELECT nama_kriteria FROM tb_kriteria order by kode_kriteria");
        while ($row = $exe->fetch_assoc())

            echo '<td> <h6 style="font-weight:bold"> Nilai ' . $row['nama_kriteria'] . ' </h6></td>';

        echo '<td> <h6 style="font-weight:bold"> Score</h6></td><td><h6 style="font-weight:bold">Ranking </h6></td><td><h6 style="font-weight:bold">Status </h6></td></tr>';


        $query5 = "SELECT * FROM tb_hasil a, tb_calonkaryawan b where a.kd_pendaftaran =  b.kd_pendaftaran order by rangking";
        $exe3 = $koneksi->query("SELECT * FROM tb_hasil a, tb_calonkaryawan b where a.kd_pendaftaran =  b.kd_pendaftaran order by rangking");

        while ($row1 = $exe3->fetch_assoc()) {
            echo $row1;
            echo '<tr>
			<td>' . $row1['nama'] . '</td>';


            $query2 = "SELECT * FROM tb_nilai where kd_pendaftaran='" . $row1['kd_pendaftaran'] . "' order by kode_kriteria";

            $exe2 = $koneksi->query($query2);
            while ($row2 = $exe2->fetch_assoc()) {
                echo '<td>' . $row2['nilai'] . '</td>';
            }
            echo '<td>' . $row2['score'] . '</td>
                  <td>' . $row2['rangking'] . '</td>';
            if ($row2['status_penerimaan'] == "1") {
                echo '<td>' . "Disetujui" . '</td>
			 </tr>';
            } else {
                echo '<td>' . "Tidak Disetujui" . '</td>
			 </tr>';
            }
        }

        ?>
    </table>
</div>