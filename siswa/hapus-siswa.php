<?php

session_start();

if(!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";

$id     = $_GET['nis'];
$foto     = $_GET['foto'];

mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE nis = '$id'");
if ($foto != 'default.php') {
    unlink('../asset/image/' . $foto); //digunakan untuk menghapus gambar. $foto=menghapus foto yg sma dg di database
}

echo "<script>
        alert('Data siswa berhasil dihapus..');
        document.location.href='siswa.php';
    </script>";
return;

?>