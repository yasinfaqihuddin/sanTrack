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
    $plgrn  = $_POST['pelanggaran'];
    $waktu  = $_POST['waktu'];
    $saksi  = $_POST['saksi'];
    $nmPelapor   = $_POST['pelapor'];
    $note   = $_POST['catatan'];

    mysqli_query($koneksi, "INSERT INTO tbl_input_pelanggaran VALUES(NULL, STR_TO_DATE('$tgl', '%m/%d/%Y'), '$nis', '$plgrn', '$waktu', NULL, NULL, '$saksi', '$nmPelapor', '$note')");

    echo "<script>
                alert('Input data pelanggaran berhasil');
                document.location.href = 'input_pelanggaran.php';
        </script>";
    return;
}

?>