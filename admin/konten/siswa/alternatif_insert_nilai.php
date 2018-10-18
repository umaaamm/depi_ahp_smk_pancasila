<?php
include "Database/koneksi.php";

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
        $query = "delete from tb_hasil where kd_pendaftaran='" . $ID_alternatif . "'";
        $hasil = $koneksi->query($query);
        //hapus dari tb_nilai
        $query = "delete from tb_nilai where kode_kriteria='" . $list_kriteria[$i] . "' and kd_pendaftaran='" . $ID_alternatif . "'";
        $hasil = $koneksi->query($query);
        //insert nilai
        $query = "Insert into tb_nilai (kd_pendaftaran,kode_kriteria,nilai) value ('" . $ID_alternatif . "','" . $list_kriteria[$i] . "','" . $nilai_alternatif[$list_kriteria [$i]] . "')";
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

echo '<script language="javascript">';
echo 'window.location.replace("./index.php?m=alternatif_nilai")';
echo '</script>';


?>