<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Pelanggaran";
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
                <li class="breadcrumb-item"><a href="prestasi.php">Datalist Prestasi</a></li>
                <li class="breadcrumb-item active">Datalist Pelanggaran</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-list"></i> Datalist Pelanggaran
                    <a href="<?= $main_url ?>/poin/add-pelanggaran.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah Datalist</a>
                    <a href="<?= $main_url ?>/poin/prestasi.php" class="btn btn-sm btn-success float-end me-1"><i class="fas fa-award"></i> Datalist Prestasi</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col"><center>No</center></th>
                                <th scope="col"><center>Pelanggaran</center></th>
                                <th scope="col"><center>Kategori</center></th>
                                <th scope="col"><center>Poin</center></th>
                                <th scope="col"><center>Operasi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $queryPelanggaran = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggaran");
                            while ($data = mysqli_fetch_array($queryPelanggaran)) {?>
                            <tr>
                                <td><center><?= $no++ ?></center></td>
                                <td><?= $data['pelanggaran'] ?></td>
                                <td><center><?= $data['jenis'] ?></center></td>
                                <td><center><?= $data['poin'] ?></center></td>
                                <td><center>
                                    <a href="edit-pelanggaran.php?no=<?= $data['no'] ?>" class="btn btn-sm btn-warning" title="Update Datalist"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-list.php?no=<?= $data['no'] ?>" class="btn btn-sm btn-danger" title="Hapus Datalist"><i class="fa-solid fa-trash"></i></a>
                                </center></td>
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