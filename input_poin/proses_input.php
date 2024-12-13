<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";

if (isset($_POST['simpan'])) {
    $tgl    = $_POST['tgl'];
    $nis    = $_POST['nis'];
    $nama   = $_POST['nama'];
    $plgrn  = $_POST['pelanggaran'];
    $jenis  = $_POST['jenis'];
    $poin   = $_POST['poin'];
    $waktu  = $_POST['waktu'];
    $saksi  = $_POST['saksi'];
    $nmPelapor   = $_POST['pelapor'];
    $note   = $_POST['catatan'];

    mysqli_query($koneksi, "INSERT INTO tbl_input_pelanggaran VALUES(NULL, '$tgl', '$nis', '$nama', '$plgrn', '$waktu', '$jenis', '$poin', '$saksi', '$nmPelapor', '$note')");

    echo "<script>
                alert('Input data pelanggaran berhasil');
                document.location.href = 'input_pelanggaran.php';
        </script>";
} else if (isset($_POST['send'])) {
    $tgl    = $_POST['tanggal'];
    $nis    = $_POST['nis'];
    $nama   = $_POST['nama'];
    $prsts  = $_POST['prestasi'];
    $kategori= $_POST['kategori'];
    $poin   = $_POST['poin'];
    $note   = $_POST['catatan'];

    mysqli_query($koneksi, "INSERT INTO tbl_input_prestasi VALUES(NULL, '$tgl', '$nis', '$nama', '$prsts', '$kategori', '$poin', '$note')");

    echo "<script>
                alert('Input data prestasi berhasil');
                document.location.href = 'input_prestasi.php';
        </script>";
    return;
}

?>