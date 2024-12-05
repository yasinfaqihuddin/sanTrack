<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Update Prestasi";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = $_GET['id'];

$queryPrestasi = mysqli_query($koneksi, "SELECT * FROM tbl_prestasi WHERE id = $id");
$data = mysqli_fetch_array($queryPrestasi);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Update Datalist Prestasi</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="prestasi.php">Datalist</a></li>
                <li class="breadcrumb-item active">Update Datalist</li>
            </ol>
            <form action="proses-poin.php" method="POST">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update Datalist Prestasi</span>
                        <button type="submit" name="perbarui" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 row">
                                <label for="prestasi" class="col-sm-2">Prestasi</label>
                                <label for="prestasi" class="col-sm-1">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <input type="text" name="prestasi" id="prestasi" class="form-control-plaintext border-bottom ps-2" value="<?= $data['prestasi'] ?>" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="kategori" class="col-sm-2">Kategori</label>
                                <label for="kategori" class="col-sm-1">:</label>
                                <div class="col-9" style="margin-left: -70px;">
                                    <select name="kategori" id="kategori" class="form-select border-0 border-bottom">
                                        <?php
                                        $kategori = ["Jayyid", "Jayyid Jiddan", "Mumtaz"];
                                        foreach($kategori as $ktg) {
                                            if($data['kategori'] == $ktg) { ?>
                                                <option value="<?= $ktg ?>" selected><?= $ktg ?></option>
                                            <?php
                                            } else { ?>
                                                <option value="<?= $ktg ?>"><?= $ktg ?></option>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="poin" class="col-sm-2">Poin</label>
                                <label for="poin" class="col-sm-1">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <input type="text" name="poin" id="poin" class="form-control-plaintext border-bottom ps-2" value="<?= $data['poin'] ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

<?php
require_once "../template/footer.php";
?>