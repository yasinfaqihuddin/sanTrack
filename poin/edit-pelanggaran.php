<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Update Siswa - Rumah Gemilang";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$no = $_GET['no'];

$queryPelanggaran = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggaran WHERE no = $no");
$data = mysqli_fetch_array($queryPelanggaran);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Update Datalist Pelanggaran</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="pelanggaran.php">Datalist</a></li>
                <li class="breadcrumb-item active">Update Datalist</li>
            </ol>
            <form action="proses-poin.php" method="POST">
                <input type="hidden" name="no" value="<?= $data['no'] ?>">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update Datalist Pelanggaran</span>
                        <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 row">
                                <label for="pelanggaran" class="col-sm-2">Pelanggaran</label>
                                <label for="pelanggaran" class="col-sm-1">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <input type="text" name="pelanggaran" id="pelanggaran" class="form-control-plaintext border-bottom ps-2" value="<?= $data['pelanggaran'] ?>" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenis" class="col-sm-2">Kategori</label>
                                <label for="jenis" class="col-sm-1">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <select name="jenis" id="jenis" class="form-select border-0 border-bottom" required>
                                        <?php
                                        $jenis = ["Ringan", "Sedang", "Berat"];
                                        foreach($jenis as $jns) {
                                            if ($data['jenis'] == $jns) { ?>
                                                <option value="<?= $jns ?>" selected><?= $jns ?></option>
                                            <?php
                                            } else { ?>
                                                <option value="<?= $jns ?>"><?= $jns ?></option>
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
</div>