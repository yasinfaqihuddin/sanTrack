<?php

session_start( );

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Guru - Ma'had Tsurayya";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}

$alert = '';
if($msg == 'deleted') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check"></i> Data guru berhasil dihapus..
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
if($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check"></i> Data guru berhasil diperbarui..
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
if($msg == 'cancel') {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-xmark"></i> Data guru gagal berhasil diperbarui, NIP sudah ada..
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Guru</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Guru</li>
            </ol>
            <?php
                if($msg != ""){
                    echo $alert;
                }
            ?>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Guru</span>
                    <a href="<?= $main_url ?>/guru/add-guru.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah Guru</a>
                </div> 
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <form action="" method="GET" class="col-4">
                            <?php
                            if (@$_GET['search']) {
                                $search = @$_GET['search'];
                            } else {
                                $search = '';
                            }
                            ?>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari" name="search" value="<?= $search ?>">
                                <button class="btn btn-secondary" type="submit" id="btnSrch"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-hover" id="datatableSimple">
                        <thead>
                            <tr>
                                <th scope="col"><center>No</center></th>
                                <th scope="col"><center>Foto</center></th>
                                <th scope="col"><center>NIP</center></th>
                                <th scope="col"><center>Nama</center></th>
                                <th scope="col"><center>Telpon</center></th>
                                <th scope="col"><center>Alamat</center></th>
                                <th scope="col"><center>Operasi</center></th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                                $pages = 5;
                                if (isset($_GET['hal'])) {
                                    $halaktif = $_GET['hal'];
                                } else {
                                    $halaktif = 1;
                                }
                                
                                if (@$_GET['search']) {
                                    $kywrd = @$_GET['search'];
                                } else {
                                    $kywrd = '';
                                }
                                
                                $start = ($pages * $halaktif) - $pages;
                                $no = $start + 1;
                                $queryGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE nama like '%$kywrd%' limit $pages offset $start");

                                $queryJmlGuru = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE nama like '%$kywrd%'");
                                $jmlGuru = mysqli_num_rows($queryJmlGuru);
                                $pages = ceil($jmlGuru / $pages);

                                if (mysqli_num_rows($queryGuru) > 0) {
                                while($data = mysqli_fetch_array($queryGuru)){
                            ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><img src="../asset/image/<?= $data['foto'] ?>" class="rounded-circle" width="60px" alt="foto guru"></td>
                                <td><?= $data['nip'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['telpon'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td align="center">
                                    <a href="edit-guru.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="update guru"><i class="fa-solid fa-pen"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" id="btnHapus" title="delete guru" data-id="<?= $data['id'] ?>" data-foto="<?= $data['foto'] ?>"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="100%" align="center">Tidak ada data</td>
                                    </tr>
                        </tbody>
                            <?php } ?>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php if ($halaktif > 1) { ?>
                            <li class="page-item">
                            <a class="page-link" href="?hal=<?= $halaktif - 1 ?>&cari=<?= $kywrd ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>
                            <?php }
                            for ($hal=1; $hal <= $pages; $hal++) {
                                if ($hal == $halaktif) { ?>
                                    <li class="page-item active"><a class="page-link" href="?hal=<?= $hal ?>&cari=<?= $kywrd ?>"><?= $hal ?></a></li>
                                    <?php } else { ?>
                                        <li class="page-item"><a class="page-link" href="?hal=<?= $hal ?>&cari=<?= $kywrd ?>"><?= $hal ?></a></li>
                                <?php }
                            }
                            if ($halaktif < $pages) {?>
                            <li class="page-item">
                            <a class="page-link" href="?hal=<?= $halaktif + 1 ?>&cari=<?= $kywrd ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>

<!-- modal hapus data -->
<div class="modal" id="mdlHapus" tabindex="-1" data-bs-backdrop="static"> <!-- data-bs-backdrop digunakan untuk membuat modal tidak bisa dihapus dg klik window/halaman selain dengan tombol -->
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Anda yakin akan menghapus data ini ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <a href="" id="btnMdlHapus" class="btn btn-primary">Ya</a>
        </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('click', "#btnHapus", function(){
            $('#mdlHapus').modal('show');
            let idGuru = $(this).data('id');
            let fotoGuru = $(this).data('foto');
            $('#btnMdlHapus').attr("href", "hapus-guru.php?id=" + idGuru + "&foto=" + fotoGuru);
        })
    })
</script>

<?php
require_once "../template/footer.php";
?>