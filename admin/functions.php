<?php
error_reporting(~E_NOTICE & ~E_DEPRECATED);
session_start();
$config["server"] = 'localhost';
$config["username"] = 'root';
$config["password"] = '';
$config["database_name"] = 'db_depi';

include 'includes/ez_sql_core.php';
include 'includes/ez_sql_mysqli.php';
$db = new ezSQL_mysqli($config['username'], $config['password'], $config['database_name'], $config['server']);
include 'includes/general.php';
include 'includes/paging.php';

$mod = $_GET['m'];
$act = $_GET['act'];

$nRI = array(
    1 => 0,
    2 => 0,
    3 => 0.58,
    4 => 0.9,
    5 => 1.12,
    6 => 1.24,
    7 => 1.32,
    8 => 1.41,
    9 => 1.46,
    10 => 1.49
);

$rows = $db->get_results("SELECT * FROM tbl_pendaftar ORDER BY id_pendaftar");
foreach ($rows as $row) {
    $ALTERNATIF[$row->id_pendaftar] = $row->nama_pendaftar;
}

$rows = $db->get_results("SELECT kode_kriteria, nama_kriteria FROM tb_kriteria ORDER BY kode_kriteria");
foreach ($rows as $row) {
    $KRITERIA[$row->kode_kriteria] = $row->nama_kriteria;
}
function AHP_get_relkriteria()
{
    global $db;
    $data = array();
    $rows = $db->get_results("SELECT k.nama_kriteria, rk.ID1, rk.ID2, nilai
        FROM tb_rel_kriteria rk INNER JOIN tb_kriteria k ON k.kode_kriteria=rk.ID1
        ORDER BY ID1, ID2");
    foreach ($rows as $row) {
        $data[$row->ID1][$row->ID2] = $row->nilai;
    }
    return $data;
}

function AHP_get_relalternatif($kriteria = '')
{
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_rel_alternatif WHERE kode_kriteria='$kriteria' ORDER BY kode1, kode2");
    $matriks = array();
    foreach ($rows as $row) {
        $matriks[$row->kode1][$row->kode2] = $row->nilai;
    }
    return $matriks;
}

function AHP_get_kriteria_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT kode_kriteria, nama_kriteria FROM tb_kriteria ORDER BY kode_kriteria");
    foreach ($rows as $row) {
        if ($row->kode_kriteria == $selected)
            $a .= "<option value='$row->kode_kriteria' selected>$row->kode_kriteria - $row->nama_kriteria</option>";
        else
            $a .= "<option value='$row->kode_kriteria'>$row->kode_kriteria - $row->nama_kriteria</option>";
    }
    return $a;
}

function AHP_get_alternatif_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT kd_pendaftaran, nama FROM tb_calonkaryawan ORDER BY kd_pendaftaran");
    foreach ($rows as $row) {
        if ($row->kd_pendaftaran == $selected)
            $a .= "<option value='$row->kd_pendaftaran' selected>$row->kd_pendaftaran - $row->nama</option>";
        else
            $a .= "<option value='$row->kd_pendaftaran'>$row->kd_pendaftaran - $row->nama</option>";
    }
    return $a;
}

function AHP_get_nilai_option($selected = '')
{
    $nilai = array(
        '1' => 'Sama penting dengan',
        '2' => 'Mendekati sedikit lebih penting dari',
        '3' => 'Sedikit lebih penting dari',
        '4' => 'Mendekati lebih penting dari',
        '5' => 'Lebih penting dari',
        '6' => 'Mendekati sangat penting dari',
        '7' => 'Sangat penting dari',
        '8' => 'Mendekati mutlak dari',
        '9' => 'Mutlak sangat penting dari',
    );
    foreach ($nilai as $key => $value) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$key - $value</option>";
        else
            $a .= "<option value='$key'>$key - $value</option>";
    }
    return $a;
}

function AHP_get_total_kolom($matriks = array())
{
    $total = array();
    foreach ($matriks as $key => $value) {
        foreach ($value as $k => $v) {
            $total[$k] += $v;
        }
    }
    return $total;
}

function matmul($mtrx1, $mtrx2) {
    $result = array();
    $row = count($mtrx1);
    $col = count($mtrx2[1]);

    for ($i = 1; $i <= $row; $i++) {
        for ($j = 1; $j <= $col; $j++) {
            if (!$result[$i]) {
                $result[$i] = array();
            }
            $total = 0;
            for ($k = 1; $k <= count($mtrx2); $k++) {
                $total += $mtrx1[$i][$k] * $mtrx2[$k][$j];
            }
            $result[$i][$j] = $total;
        }
    }
    return $result;
}

function total_kolom($mtrx) {
    $result = array();

    foreach ($mtrx as $k => $v) {
        $result[$k] = 0;
        foreach ($v as $nk => $nv) {
            $result[$k] += $nv;
        }
    }

    return $result;
}

function transpose($array) {
    array_unshift($array, null);
    return call_user_func_array('array_map', $array);
}

function AHP_normalize($matriks = array(), $total = array())
{

    foreach ($matriks as $key => $value) {
        foreach ($value as $k => $v) {
            $matriks[$key][$k] = $matriks[$key][$k] / $total[$k];
        }
    }
    return $matriks;
}

function AHP_get_rata($normal)
{
    $rata = array();
    foreach ($normal as $key => $value) {
        $rata[$key] = array_sum($value) / count($value);
    }
    return $rata;
}

function AHP_mmult($matriks = array(), $rata = array())
{
    $data = array();

    $rata = array_values($rata);

    foreach ($matriks as $key => $value) {
        $no = 0;
        foreach ($value as $k => $v) {
            $data[$key] += $v * $rata[$no];
            $no++;
        }
    }

    return $data;
}

function AHP_consistency_measure($matriks, $rata)
{
    $matriks = AHP_mmult($matriks, $rata);
    foreach ($matriks as $key => $value) {
        $data[$key] = $value / $rata[$key];
    }
    return $data;
}

function AHP_get_eigen_alternatif($kriteria = array())
{
    $data = array();
    foreach ($kriteria as $key => $value) {
        $kode_kriteria = $key;
        $matriks = AHP_get_relalternatif($kode_kriteria);
        $total = AHP_get_total_kolom($matriks);
        $normal = AHP_normalize($matriks, $total);
        $rata = AHP_get_rata($normal);
        $data[$kode_kriteria] = $rata;
    }
    $new = array();
    foreach ($data as $key => $value) {
        foreach ($value as $k => $v) {
            $new[$k][$key] = $v;
        }
    }
    return $new;
}

function AHP_get_rank($array)
{
    $data = $array;
    arsort($data);
    $no = 1;
    $new = array();
    foreach ($data as $key => $value) {
        $new[$key] = $no++;
    }
    return $new;
}