<?php

// buat koneksi
$koneksi = mysqli_connect("localhost", "root", "", "db_sekolah");

// cek koneksi
// if(mysqli_connect_errno()) {
//     echo "Gagal koneksi ke database";
// }else {
//     echo "berhasil koneksi ke database";
// }

// url induk
// $main_url = "http://localhost/sekolah";
$main_url = "http://localhost/sekolah";

function uploadimg($url) {
    $namafile   = $_FILES["image"]["name"];
    $ukuran     = $_FILES["image"]["size"];
    $error      = $_FILES["image"]["error"];
    $tmp        = $_FILES["image"]["tmp_name"];

    // cek file yang diupload
    $validExtension = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $namafile); // explode utk memisahkan nama file dg extension yaitu dengan titik '.'
    $fileExtension = strtolower(end($fileExtension)); //strtolower(mengubah mnjd hrf kecil). end..mengambil bagian terakhir dalam array, extensionnya (jpg dll)
    if (!in_array($fileExtension, $validExtension)) {
        header("location:" . $url . '?msg=notimage');
        die;
    }

    // cek ukuran gambar
    if($ukuran > 1000000) {
        header("location:" . $url . '?msg=oversize');
        die;
    }

    // generate nama file gambar
    if ($url == 'profile-sekolah.php') {
        $namafilebaru = rand(0, 50) . '-bgLogin.' . $fileExtension; // memberi nama file/foto yang diupload
    } else {
        $namafilebaru = rand(10, 1000) . '-' . $namafile;
    }

    // upload gambar
    move_uploaded_file($tmp, "../asset/image/" . $namafilebaru);
    return $namafilebaru;
}