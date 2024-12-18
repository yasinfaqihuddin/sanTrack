<?php

session_start();

if(!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hasil Ujian</title>
</head>
<body>
    <div style="text-align: center;">
        <h2 style="margin-bottom: -15px;">Laporan Hasil Ujian</h2>
        <h2 style="margin-bottom: 15px;">Mahad Tsurayya</h2>
    </div>

    <table>
        <thead>
            <tr>
                <td colspan="8" style="height: 5px;">
                    <hr style="margin-bottom: 2px; margin-left: -5px;", size="3" color="grey">
                </td>
            </tr>
            <tr>
                <th style="width: 70px;">No Ujian</th>
                <th style="width: 70px;">NIS</th>
                <th style="width: 130px;">Nama</th>
                <th>Jurusan</th>
                <th style="width: 110px;">Nilai Terendah</th>
                <th style="width: 100px;">Nilai Tertinggi</th>
                <th style="width: 100px;">Rata-rata</th>
                <th style="width: 100px;">Hasil Ujian</th>
            </tr>
            <tr>
                <td colspan="8">
                    <hr style="margin-bottom: 2px; margin-top: 1px; margin-left: -5px;", size="3" color="grey">
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataUjian = mysqli_query($koneksi, "SELECT * FROM tbl_ujian");
            while ($data = mysqli_fetch_array($dataUjian)) { ?>
                <tr>
                    <td align="center"><?= $data['no_ujian'] ?></td>
                    <td align="center"><?= $data['nis'] ?></td>
                    <td align="center"><?= $data['nama'] ?></td>
                    <td><?= $data['jurusan'] ?></td>
                    <td align="center"><?= $data['nilai_terendah'] ?></td>
                    <td align="center"><?= $data['nilai_tertinggi'] ?></td>
                    <td align="center"><?= $data['nilai_rata2'] ?></td>
                    <td align="center"><?= $data['hasil_ujian'] ?></td>
                </tr>
                <tr>
                    <td colspan="8">
                        <hr style="margin-bottom: 2px; margin-top: 1px; margin-left: -5px;", size="1" color="grey">
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8">
                    <hr style="margin-top: 1px; margin-bottom: 2px; margin-left: -5px;", size="3", color="grey">
                    <p>Surabaya, <?= date('j F Y') ?></p>
                    <p>Dibuat oleh, <b>Dewan Guru Mahad Tsurayya</b></p>
                </td>
            </tr>
        </tfoot>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>