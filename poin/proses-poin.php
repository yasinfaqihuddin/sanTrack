<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";

if(isset($_POST['simpan'])) {
    $pelanggaran= $_POST['pelanggaran'];
    $jenis      = $_POST['jenis'];
    $poin       = $_POST['poin'];

    mysqli_query($koneksi, "INSERT INTO tbl_pelanggaran VALUES(null, '$pelanggaran', '$jenis', '$poin')");

    echo "<script>
                alert('Datalist pelanggaran berhasil disimpan');
                document.location.href = 'add-pelanggaran.php';
        </script>";

} else if(isset($_POST['add'])) {
    $prestasi   = $_POST['prestasi'];
    $kategori   = $_POST['kategori'];
    $poin       = $_POST['poin'];

    mysqli_query($koneksi, "INSERT INTO tbl_prestasi VALUES(null, '$prestasi', '$kategori', $poin)");

    echo "<script>
                alert('Datalist prestasi berhasil disimpan');
                document.location.href = 'add-prestasi.php';
        </script>";

} else if(isset($_POST['update'])) {
    $no         = $_POST['no'];
    $pelanggaran= $_POST['pelanggaran'];
    $jenis      = $_POST['jenis'];
    $poin       = $_POST['poin'];

    mysqli_query($koneksi, "UPDATE tbl_pelanggaran SET
                            pelanggaran = '$pelanggaran',
                            jenis       = '$jenis',
                            poin        = '$poin'
                            WHERE no    = '$no'
                            ");
    
    echo "<script>
            alert('Datalist pelanggaran berhasil diupdate');
            document.location.href='pelanggaran.php';
        </script>";

} else if(isset($_POST['perbarui'])) {
    $id         = $_POST['id'];
    $prestasi   = $_POST['prestasi'];
    $kategori   = $_POST['kategori'];
    $poin       = $_POST['poin'];

    mysqli_query($koneksi, "UPDATE tbl_prestasi SET
                            prestasi    = '$prestasi',
                            kategori    = '$kategori',
                            poin        = '$poin'
                            WHERE id    = '$id'
                            ");

    echo "<script>
            alert('Datalist prestasi berhasil diupdate');
            document.location.href='prestasi.php';
        </script>";
    return;
}

?>