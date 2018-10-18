<?php
include 'koneksi/koneksi.php';
include 'functions.php';

if (isset($_POST['cll'])) {
    $RI = array(0, 0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59);
    $mat_sementara = $_POST['cll'];
    $Nkri = count($mat_sementara);
    for ($i = 0; $i <= $Nkri; $i++)
        for ($j = 0; $j <= $Nkri; $j++)
            if ($i == $j)
                $mat_sementara[$i][$j] = 1;
            else
                if ($j < $i)
                    $mat_sementara[$i][$j] = 1 / $mat_sementara[$j][$i];

    //pindah ke matriks perbandingan
    for ($i = 0; $i <= $Nkri; $i++)
        for ($j = 0; $j <= $Nkri; $j++)
            $mat_perbandingan [$i + 1][$j + 1] = $mat_sementara[$i][$j];


    $Nkri = count($mat_perbandingan);

    $kwadrat_matrix = matmul($mat_perbandingan, $mat_perbandingan);
    //penjumlahan kolom => $jml
    for ($i = 1; $i <= $Nkri; $i++)
        $jml [$i] = 0;

    $total_baris = 0;
    for ($i = 1; $i <= $Nkri; $i++)
        for ($j = 1; $j <= $Nkri; $j++) {
            $jml[$i] += $kwadrat_matrix[$i][$j];
            $total_baris += $kwadrat_matrix[$i][$j];
        }

    // hitung eigen vector kriteria
    $eigen_kriteria = array();
    for ($i = 1; $i <= $Nkri; $i++) {
        $eigen_kriteria[$i] = $jml[$i] / $total_baris;
    }

    // kalikan pairwise dengan eigen kriteria
    $pairwiseXeigen_kriteria = array();
    foreach ($mat_perbandingan as $k_p => $v_p) {
        $pairwiseXeigen_kriteria[$k_p] = 0;
        foreach ($eigen_kriteria as $k_k => $v_k) {
            $pairwiseXeigen_kriteria[$k_p] += $mat_perbandingan[$k_p][$k_k] * $eigen_kriteria[$k_k];
        }
    }
   
    $vektor_konsistensi = array();
    $total_vektor_konsistensi = 0;
    foreach ($pairwiseXeigen_kriteria as $k => $v) {
        $vektor_konsistensi[$k] = $v / $eigen_kriteria[$k];
        $total_vektor_konsistensi += $vektor_konsistensi[$k];
    }
    $rata2_vektor_konsistensi = $total_vektor_konsistensi / $Nkri;
    $K = (($rata2_vektor_konsistensi - $Nkri) / ($Nkri - 1)) / $RI[$Nkri];

    if ($K < 0.1) {

        $mat_alternatif = array();
        $list_kd_pendaftaran = array();
        $list_kriteria_alternatif = array();
        $query = "SELECT id_pendaftar FROM tbl_pendaftar";
        $exe = $koneksi->query($query);
        $z = 1;
        while ($row = $exe->fetch_assoc())
            //ambil daftar kd_pendaftaran
            $list_kd_pendaftaran[$z++] = $row['id_pendaftar'];

        for ($i_kriteria = 1; $i_kriteria <= $Nkri; $i_kriteria++) {
            $query = "SELECT * FROM tb_nilai where kode_kriteria='" . $i_kriteria . "'";
            $exe = $koneksi->query($query);
            while ($row = $exe->fetch_assoc())
                $list_kriteria_alternatif[$i_kriteria][$row['id_pendaftar']] = $row['nilai'];
                
        }

        // build matrix alternatif
        for ($i_kriteria = 1; $i_kriteria <= $Nkri; $i_kriteria++) {
            foreach ($list_kd_pendaftaran as $k1 => $v1) {
                foreach ($list_kd_pendaftaran as $k2 => $v2) {
                    $mat_alternatif[$i_kriteria][$k1][$k2] = $list_kriteria_alternatif[$i_kriteria][$v1] / $list_kriteria_alternatif[$i_kriteria][$v2];
                    //print_r($mat_alternatif[$i_kriteria][$k1][$k2]);
                }
            }
               
        }
        //print_r("<br>"+$mat_alternatif);die;
       // die;
        // kwadratkan
        for ($i_kriteria = 1; $i_kriteria <= $Nkri; $i_kriteria++) {
            $mat_alternatif[$i_kriteria] = matmul($mat_alternatif[$i_kriteria], $mat_alternatif[$i_kriteria]);
               
        }

        // total kolom
        $total_kolom = array();
        for ($i_kriteria = 1; $i_kriteria <= $Nkri; $i_kriteria++) {
            $total_kolom[$i_kriteria] = total_kolom($mat_alternatif[$i_kriteria]);   
        }

        $eigen_alternatif = array();
        for ($i_kriteria = 1; $i_kriteria <= $Nkri; $i_kriteria++) {
            $total_semua_kolom = 0;
            foreach ($total_kolom[$i_kriteria] as $k => $v) {
                $total_semua_kolom += $v;
            }   

            foreach ($total_kolom[$i_kriteria] as $k => $v) {
                $eigen_alternatif[$i_kriteria][$k] = $v / $total_semua_kolom;
            }   
               
        }
        //print_r($total_semua_kolom);die;
        $hasil = array();
        
        // result
        foreach ($eigen_alternatif as $k => $v) {
            foreach ($v as $k2 => $v2) {
                if (!$hasil[$k2]) {
                    $hasil[$k2] = 0;
                }
                $hasil[$k2] += $eigen_alternatif[$k][$k2] * $eigen_kriteria[$k];
                //print_r($eigen_alternatif[$k][$k2]+"<br>");
            }
        }
//         print_r($hasil);
// die;
        $map_kd_pendaftaran_hasil = array();
        foreach ($hasil as $k => $v) {
            $map_kd_pendaftaran_hasil[] = ['id_pendaftar' => $list_kd_pendaftaran[$k], 'score' => $v];
        }
        //print_r($map_kd_pendaftaran_hasil);die;
        function sortByOrder($a, $b)
        {
            return (float)$b['score'] > (float)$a['score'];
        }

        usort($map_kd_pendaftaran_hasil, 'sortByOrder');

        //kosongkan table rangking
        $query = "truncate table tb_hasil";
        $exe = $koneksi->query($query);

        for ($i = 0; $i < count($map_kd_pendaftaran_hasil); $i++) {
            //kosongkan table rangking
            $query = "insert into tb_hasil (id_pendaftar,score,rangking,status_penerimaan) value ('" . $map_kd_pendaftaran_hasil[$i]['id_pendaftar'] . "','" . $map_kd_pendaftaran_hasil[$i]['score'] . "','" . ($i + 1) . "','0')";
            $exe = $koneksi->query($query);

        }

        $dateFile = "./ci";

        $dataString = $K;
        $fWrite = fopen($dateFile, 'w');
        $wrote = fwrite($fWrite, $K);
        fclose($fWrite);

        echo '<script language="javascript">
            alert("Data telah berhasil di rangking silahkan lihat hasil di laporan")
            window.location.replace("./index.php?m1=hitung&m2=hasil")
            </script>';
    } else echo '<script language="javascript">
            alert("Input tidak konsisten, silahkan inputkan nilai kriteria lagi")
            window.location.replace("./index.php?m1=hitung&m2=hitung_altenatif")
            </script>';
    
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head><title> Sietem Pendukung Keputusan Pemilihan Calon Karyawan PT GGP </title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../css/load/jquery.min.js"></script>
    <script src="../css/load/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <img src="../images/head.png" class="img-responsive" alt="Responsive image">
    </div>

    <div class="row">

        <!-- sidebar content-->
        <div class="col-md-9">
            <form action="?m=nilai_kriteria" method="POST">
                <h4>Tabel Tingkat Kepentingan</h4>
                <table class="table-striped table-bordered">
                    <tr>
                        <td width="50" align="center"><b> Nilai </b></td>
                        <td width="250" align="center"><b> Interpretasi </b></td></br>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td>Sama Dengan</td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td>Mendekati sedikit lebih penting dari</td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td>Sedikt lebih penting dari</td>
                    </tr>
                    <tr>
                        <td align="center">4</td>
                        <td>Mendekati lebih penting dari</td>
                    </tr>
                    <tr>
                        <td align="center">5</td>
                        <td>Lebih penting dari</td>
                    </tr>
                    <tr>
                        <td align="center">6</td>
                        <td>Mendekati sama penting dari</td>
                    </tr>
                    <tr>
                        <td align="center">7</td>
                        <td>Sangat penting dari</td>
                    </tr>
                    <tr>
                        <td align="center">8</td>
                        <td>Mendekati mutlak dari</td>
                    </tr>
                    <tr>
                        <td align="center">9</td>
                        <td>Mutlak sangat penting dari</td>
                    </tr>
                </table>
                <br><br>

                <div class="table-responsive">
                    <b>Silahkan masukkan nilai kedalam matriks perbandingan berikut berdasarkan tabel tingkat
                        kepentingan diatas</b><br> <br>
                    <table class="table table table-bordered">
                        <?php
                        function pggl_combo($nama)
                        {
                            echo '<select name="' . $nama . '">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    </select>';
                        }

                        $query = "SELECT * FROM kriteria order by id_kriteria";
                        $exe = $koneksi->query($query);
                        $no = 1;
                        //$mat ;
                        while ($row = $exe->fetch_assoc()) {
                            $b = $row['nama_kriteria'];
                            $mat[] = $b;
                            $no++;
                        }
                        ///print_r($mat);
                        echo '<tr>
                        <td></td>';
                        for ($i = 0; $i < count($mat); $i++)
                            echo '<td bgcolor="#f2f2f2"><b>' . $mat[$i] . '<b></td>';
                        echo '</tr>';

                        for ($i = 0; $i < count($mat); $i++) {
                            echo '<tr>';
                            echo '<td bgcolor="#f2f2f2"><b>' . $mat[$i] . '</b></td>';
                            for ($j = 0; $j < count($mat); $j++)
                                if ($j == $i)
                                    echo '<td>1</td>';
                                else if ($j > $i) {
                                    $nama = 'cll[' . $i . '][' . $j . ']';
                                    echo '<td>';
                                    pggl_combo($nama);
                                    echo '</td>';
                                } else
                                    echo '<td></td>';

                            echo '</tr>';

                        }
                        ?>
                        <table>
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            <br><br>
                </div>
            </form>
        </div>
        <div class="clearfix visible-lg"></div>
    </div>
</div>
</body>
</html>