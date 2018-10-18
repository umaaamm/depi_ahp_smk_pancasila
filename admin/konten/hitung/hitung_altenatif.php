<?php
    include "functions.php";
?>
<style>
    .text-primary {
        font-weight: bold;
    }
</style>

<?php
$c = $db->get_results("SELECT * FROM tbl_pendaftar");
if (!$ALTERNATIF || !$KRITERIA):
    echo "Tampaknya anda belum mengatur alternatif dan kriteria. Silahkan tambahkan minimal 3 alternatif dan 3 kriteria.";
elseif (!$c):
    echo "Tampaknya anda belum mengatur nilai alternatif. Silahkan atur pada menu <strong>Nilai Bobot</strong> > <strong>Nilai Bobot Alternatif</strong>.";
else:
    ?>

    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Matriks Perbandingan Kriteria</strong></div>
        <div class="panel-body">
            <form action="?m1=hitung&m2=nilai_kriteria" method="POST">
                <h4><font color='green'>Tabel Tingkat Kepentingan</font></h4>
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

                        include 'koneksi/koneksi.php';
                        $query = "SELECT * FROM tb_kriteria order by kode_kriteria";
                        $exe = $koneksi->query($query);
                       
                        $no = 1;
                        //$mat ;
                        while ($row = $exe->fetch_assoc()) {
                            $b = $row['nama_kriteria'];
                            $mat[] = $b;
                            $no++;
                        }
                        //print_r($mat);
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
                        </table>
                    </table>
                </div>

            </form>
        </div>
        <div class="clearfix visible-lg"></div>
    </div>

<?php endif ?>