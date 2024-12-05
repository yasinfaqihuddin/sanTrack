<?php

session_start();

if(!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";

if(isset($_GET['no'])) {
    $no = $_GET['no'];
    mysqli_query($koneksi, "DELETE FROM tbl_pelanggaran WHERE no = '$no'");
    echo "<script>
            alert('Datalist berhasil dihapus..');
            document.location.href='pelanggaran.php';
        </script>";
} else if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    mysqli_query($koneksi, "DELETE FROM tbl_prestasi WHERE id = '$id'");
    
    echo "<script>
            alert('Datalist berhasil dihapus..');
            document.location.href='prestasi.php';
        </script>";
    return;
}


?>