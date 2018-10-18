<?php
include "koneksi/koneksi.php";

if (isset($_POST['submit'])) {
$ID_alternatif = $_POST['id'];
//ambil id_kriteria
$query = "SELECT kode_kriteria FROM tb_kriteria ";
$exe = $koneksi->query($query);
while ($row = $exe->fetch_assoc()) {
    $list_kriteria [] = $row['kode_kriteria'];
}

//ambil data dari form sebelumnya               
for ($i = 0; $i < count($list_kriteria); $i++)
    $nilai_alternatif[$list_kriteria [$i]] = $_POST['nilai'][$list_kriteria [$i]];
//print_r($nilai_alternatif); 

for ($i = 0; $i < count($nilai_alternatif); $i++)
    if ($nilai_alternatif[$list_kriteria [$i]] != '') {
        //hapus dari tb_hasil
        $query = "delete from tb_hasil where id_pendaftar='" . $ID_alternatif . "'";
        $hasil = $koneksi->query($query);
        //hapus dari tb_nilai
        $query = "delete from tb_nilai where kode_kriteria='" . $list_kriteria[$i] . "' and id_pendaftar='" . $ID_alternatif . "'";
        $hasil = $koneksi->query($query);
        //insert nilai
        $query = "Insert into tb_nilai (id_pendaftar,kode_kriteria,nilai) value ('" . $ID_alternatif . "','" . $list_kriteria[$i] . "','" . $nilai_alternatif[$list_kriteria [$i]] . "')";
        $hasil = $koneksi->query($query);
        //echo $query.'<br />';
    }


if ($hasil) //jika query simpan buku tamu berhasil
{
//tampilkan pesan berhasil
    echo '<script language="javascript">';
    echo 'alert("Data Successfully Saved")';
    echo '</script>';
} else //jika query gagal
{
//tampilkan pesan gagal
    echo '<script language="javascript">';
    echo 'alert("Data Failed to Save")';
    echo '</script>';
}

echo "<meta http-equiv=refresh content=1;url='?m1=siswa&m2=nilaisiswa'>";
}

?>
<div class="row">  
<div class="col-md-12">
    <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Kelola Nilai</h3>
            </div>
    <form action="" method="post">
<div class="box-body">
        <div class="form-group"><br>
            <label>Nama Calon Siswa</label>
            <select name="id" class="form-control">
                <?php
                include 'koneksi/koneksi.php';
                $query = "SELECT id_pendaftar,nama_pendaftar FROM tbl_pendaftar ";
                $exe = $koneksi->query($query);
                $no = 1;
               
                while ($row = $exe->fetch_assoc()) {
                    echo '<option value="' . $row['id_pendaftar'] . '">' . $row['nama_pendaftar'] . '</option>';
                }
                ?>
            </select>
        </div>
        <?php
        include 'koneksi/koneksi.php';
        $query = "SELECT kode_kriteria, nama_kriteria FROM tb_kriteria";
        $exe = $koneksi->query($query);
        while ($row = $exe->fetch_assoc()) {
            echo '<div class="form-group">
			<label for="nilai[' . $row['kode_kriteria'] . ']">Nilai ' . $row['nama_kriteria'] . ' ( 10 - 100 )* </label>
			<input type="number" min="10" max="100" class="form-control" name="nilai[' . $row['kode_kriteria'] . ']" id="nilai[' . $row['kode_kriteria'] . ']" placeholder="Nilai ' . $row['nama_kriteria'] . '">
			</div>';
        }
        ?>
        <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>Update
        </button>
    </form>
    
    <br>
    <br>
    <br>


    <?php
    //GET LIST KRITERIA
    include 'koneksi/koneksi.php';
    $query = "SELECT * FROM tb_kriteria";
    $exe = $koneksi->query($query);
    while ($row = $exe->fetch_array()) {
        $listKriteria[] = $row;
    }
    //print_r($listKriteria);

    //GET LIST ALTERNATIF
    include 'koneksi/koneksi.php';
    $query = "SELECT * FROM tbl_pendaftar";
    $exe = $koneksi->query($query);
    while ($row = $exe->fetch_array()) {
        $listAlternatif[] = $row;
    }
    ?>

    <table class="table table-bordered table-striped" id="example3">
            <thead>
        <tr>
            <th>No. Pendaftaran</th>
            <th>Nama</th>
            <?php

            for ($i = 0; $i < count($listKriteria); $i++) {
                echo '<th>' . $listKriteria[$i][1] . '</th>';
            }
            ?>
        </tr>
    </thead>
        <?php
        for ($i = 0; $i < count($listAlternatif); $i++) {
            echo '<tr>
            <td>' . $listAlternatif[$i][0] . '</td><td>' . $listAlternatif[$i][1] . '</td>';

            for ($j = 0; $j < count($listKriteria); $j++) {
                $query = "SELECT * FROM tb_nilai where id_pendaftar='" . $listAlternatif[$i][0] . "' and kode_kriteria='" . $listKriteria[$j][0] . "' limit 1";
                $exe = $koneksi->query($query);
                $nilai = 'Belum Ada Nilai';
                while ($row = $exe->fetch_array())
                    $nilai = $row[3];
                echo '<td>' . $nilai . '</td>';
            }
            echo '</tr>';
        }
        ?>

    </table>
</div>
</div>
</div>
</div>
