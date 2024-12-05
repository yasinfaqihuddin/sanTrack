<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";

if(isset($_POST['simpan'])) {
    $nis    = $_POST['nis'];
    $nama   = htmlspecialchars($_POST['nama']);
    $kelas  = $_POST["kelas"];
    $jurusan= $_POST["jurusan"];
    $alamat = htmlspecialchars($_POST['alamat']);
    $walsan = htmlspecialchars($_POST['walsan']);
    $foto   = htmlspecialchars($_FILES['image']['name']);

    if($foto != null) {
        $url = "add-siswa.php";
        $foto= uploadimg($url);
    } else {
        $foto= 'default.png';
    }

    if($walsan = null) {
        $walsan = '089621966663';
    }

    mysqli_query($koneksi, "INSERT INTO tbl_siswa VALUES('$nis', '$nama', '$alamat', '$kelas', '$jurusan', '$walsan', '$foto')");

    echo "<script>
                alert('Data siswa berhasil disimpan');
                document.location.href = 'add-siswa.php';
        </script>";
    return;
} else if (isset($_POST['update'])) {
    $nis    = $_POST['nis'];
    $nama   = htmlspecialchars($_POST['nama']);
    $kelas  = $_POST['kelas'];
    $jurusan= $_POST['jurusan'];
    $alamat = htmlspecialchars($_POST['alamat']);
    $walsan = htmlspecialchars($_POST['walsan']);
    $foto   = htmlspecialchars($_POST['fotoLama']);

    if($_FILES['image']['error'] === 4) {
        $fotoSiswa = $foto;
    } else {
        $url = "siswa.php";
        $fotoSiswa = uploadimg($url);
        if($foto != 'default.png') {
            @unlink('../asset/image/'. $foto);
        }
    }

    mysqli_query($koneksi, "UPDATE tbl_siswa SET
                            nama    = '$nama',
                            alamat  = '$alamat',
                            kelas   = '$kelas',
                            jurusan = '$jurusan',
                            walsan = '$walsan',
                            foto    = '$fotoSiswa'
                            WHERE nis = '$nis'
                            ");

    echo "<script>
            alert('Data santri berhasil diupdate');
            document.location.href='siswa.php';
        </script>";
    return;
}

?>