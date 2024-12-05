<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Prestasi";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Data Nilai Kesantrian</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="pelanggaran.php">Datalist Pelanggaran</a></li>
                <li class="breadcrumb-item active">Datalist Prestasi</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-list"></i> Datalist Prestasi
                    <a href="<?= $main_url ?>/poin/add-prestasi.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah Datalist</a>
                    <a href="<?= $main_url ?>/poin/pelanggaran.php" class="btn btn-sm btn-danger float-end me-1"><i class="fas fa-triangle-exclamation"></i> Datalist Pelanggaran</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                                <tr>
                                    <th scope="col"><center>No</center></th>
                                    <th scope="col"><center>Prestasi</center></th>
                                    <th scope="col"><center>Kategori</center></th>
                                    <th scope="col"><center>Poin</center></th>
                                    <th scope="col"><center>Operasi</center></th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $queryPrestasi = mysqli_query($koneksi, "SELECT * FROM tbl_prestasi");
                            while($data = mysqli_fetch_array($queryPrestasi)) { ?>
                            <tr>
                                <td><center><?= $no++ ?></center></td>
                                <td><?= $data['prestasi'] ?></td>
                                <td><center><?= $data['kategori'] ?></center></td>
                                <td><center><?= $data['poin'] ?></center></td>
                                <td><center>
                                    <a href="edit-prestasi.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="Update Datalist"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-list.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-danger" title="Hapus Datalist"><i class="fa-solid fa-trash"></i></a>
                                </center></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </main>

<?php
require_once "../template/footer.php";
?>