<?php

session_start();

if(!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Santri Lulus Ujian - Ma'had Tsurayya";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Lulus Ujian</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Data Siswa Lulus Ujian</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-list"></i> Data Siswa Lulus Ujian
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col"><center>No Ujian</center></th>
                                <th scope="col"><center>NIS</center></th>
                                <th scope="col"><center>Jurusan</center></th>
                                <th scope="col"><center>Nilai Terendah</center></th>
                                <th scope="col"><center>Nilai Tertinggi</center></th>
                                <th scope="col"><center>Nilai Rata-rata</center></th>
                                <th scope="col"><center>Hasil Ujian</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryLulus = mysqli_query($koneksi, "SELECT * FROM tbl_ujian WHERE hasil_ujian = 'LULUS'");
                            while ($data = mysqli_fetch_array($queryLulus)) { ?>
                                <tr>
                                    <td><?= $data['no_ujian'] ?></td>
                                    <td><?= $data['nis'] ?></td>
                                    <td><?= $data['jurusan'] ?></td>
                                    <td align="center"><?= $data['nilai_terendah'] ?></td>
                                    <td align="center"><?= $data['nilai_tertinggi'] ?></td>
                                    <td align="center"><?= $data['nilai_rata2'] ?></td>
                                    <td align="center"><button type="button" class="btn btn-success btn-sm rounded-0 col-10 fw-bold text-uppercase"><?= $data['hasil_ujian'] ?></button></td>
                                </tr>
                                
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
<?php
require_once "../template/footer.php";
?>
</div>
