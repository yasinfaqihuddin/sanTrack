<?php

session_start();

if(!isset($_SESSION["ssLogin"])) {
    header("location: auth/login.php");
    exit;
}

require_once "../config.php";

// jika tombol simpan ditekan
if(isset($_POST['simpan'])) {
    // ambil value yang diposting
    $id         = $_POST['id'];
    $nama       = trim(htmlspecialchars($_POST['nama'])); //htmlspecialchars adalah validasi, melindungi dari serangan xss(cross site scripting)
    $kepsek     = trim(htmlspecialchars($_POST['kepsek']));
    $email      = trim(htmlspecialchars($_POST['email']));
    $status     = $_POST['status'];
    $akreditasi = $_POST['akreditasi'];
    $alamat     = trim(htmlspecialchars($_POST['alamat']));
    $visimisi   = trim(htmlspecialchars($_POST['visimisi']));
    $hp         = trim(htmlspecialchars($_POST['hp']));
    $gbr        = trim(htmlspecialchars($_POST['gbrLama']));

    // cek apakah gambar user
    if($_FILES['image']['error'] ===4) {
        $gbrSekolah = $gbr;
    } else {
        $url = 'profile-sekolah.php';
        $gbrSekolah = uploadimg($url);
        @unlink('../asset/image/' . $gbr);
    }

    // update data
    mysqli_query($koneksi, "UPDATE tbl_sekolah SET
                            nama        = '$nama',
                            kepsek      = '$kepsek',
                            email       = '$email',
                            akreditasi  = '$akreditasi',
                            status      = '$status',
                            alamat      = '$alamat',
                            visimisi    = '$visimisi',
                            hp       = '$hp',
                            gambar      = '$gbrSekolah'
                            WHERE id    = $id
                            ");
    header("location:profile-sekolah.php?msg=updated");
    return;
}

?>