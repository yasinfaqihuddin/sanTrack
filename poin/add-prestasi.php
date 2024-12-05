<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Tambah Datalist";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Tambah Datalist Prestasi</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="prestasi.php">Datalist Prestasi</a></li>
                <li class="breadcrumb-item active">Tambah Datalist</li>
            </ol>
            <form action="proses-poin.php" method="POST">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Datalist</span>
                        <button type="submit" name="add" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 row">
                                <label for="Prestasi" class="col-sm-2">Prestasi</label>
                                <label for="Prestasi" class="col-sm-1">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <input type="text" name="prestasi" id="prestasi" class="form-control-plaintext border-bottom ps-2" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="Kategori" class="col-sm-2">Kategori</label>
                                <label for="Kategori" class="col-sm-1">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <select name="kategori" id="kategori" class="form-select border-0 border-bottom">
                                        <option value="Jayyid">Jayyid</option>
                                        <option value="Jayyid Jiddan">Jayyid Jiddan</option>
                                        <option value="Mumtaz">Mumtaz</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="poin" class="col-sm-2">Poin</label>
                                <label for="poin" class="col-sm-1">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <input type="text" name="poin" id="poin" class="form-control-plaintext border-bottom ps-2" required>
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