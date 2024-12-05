<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Input Pelanggaran";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Input Poin</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Input Pelanggaran</li>
            </ol>
                <form onsubmit="sendMessage()">
                    <div class="card">
                        <div class="card-header">
                            <span class="h5 my-2"><i class="fa-solid fa-list"></i> Input Pelanggaran</span>
                            <button type="submit" id="btnKirim" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                            <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-rotate-right"></i> Reset</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-calendar-days fa-sm"></i></span>
                                        <input type="date" name="tgl" id="date" class="form-control" required>
                                    </div>
                                    <div class="mb-2 input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-user fa-sm"></i></span>
                                        <select name="nis" id="nis" class="form-select" required>
                                            <option value="" hidden>Pilih Santri</option>
                                            <?php
                                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM tbl_siswa");
                                            while($data = mysqli_fetch_array($querySiswa)) { ?>
                                                <option value="<?= $data['nama'] ?>"><?= $data['nis'] . '-' . $data['nama'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-2 input-group">
                                        <span class="input-group-text"><i class="fas fa-triangle-exclamation fa-sm"></i></span>
                                        <select name="pelanggaran" id="pelanggaran" class="form-select" required>
                                            <option value="" hidden>Pelanggaran</option>
                                            <?php
                                            $queryPelanggaran = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggaran");
                                            while($db = mysqli_fetch_array($queryPelanggaran)) { ?>
                                                <option value="<?= $db['pelanggaran'] ?>"><?= $db['pelanggaran'] . '-' . $db['poin'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-2 input-group">
                                        <span class="input-group-text"><i class="fas fa-clock fa-sm"></i></span>
                                        <input type="text" name="waktu" id="waktu" class="form-control" placeholder="Waktu 'Istirahat siang'">
                                    </div>
                                    <div class="mb-2 input-group">
                                        <span class="input-group-text"><i class="fas fa-eye fa-sm"></i></span>
                                        <select name="saksi" id="saksi" class="form-select">
                                            <option value="" hidden>Saksi</option>
                                            <option value="Teman">Teman</option>
                                            <option value="Musyrif/ah">Musyrif/ah</option>
                                            <option value="Ustadz/ah">Ustadz/ah</option>
                                        </select>
                                    </div>
                                    <div class="mb-2 input-group">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama saksi">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="mb-2 input-group">
                                        <textarea name="catatan" id="catatan" placeholder="catatan.." class="form-control"  cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </main>
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa");
    $dt = mysqli_fetch_array($query);
    ?>

    <script>
        function sendMessage() {
            const date = document.getElementById("date").value;
            const nis = document.getElementById("nis").value;
            const pelanggaran = document.getElementById("pelanggaran").value;
            const waktu = document.getElementById("waktu").value;
            const saksi = document.getElementById("saksi").value;
            const nama = document.getElementById("name").value;
            const catatan = document.getElementById("catatan").value;

            // const url = "https://api.whatsapp.com/send?phone=<?//= $dt['walsan'] ?>&text=Assalamualaikum%20Warohmatullahi%20Wabarokatuh%20Bapak%2FIbu%0A%0AKami%20dari%20pihak%20Mahad%20Tsurayya%20ingin%20melaporkan%20bahwasanya%20ananda%20*"+ nis +"*%20telah%20melakukan%20pelanggaran%20berupa%20*"+ pelanggaran +"*.%20Yang%20disaksikan%20oleh%20*"+ nama +"*%20(*"+ saksi +"*)%0AKami%20telah%20memberikan%20teguran%20kepada%20ananda.%20Semoga%20ananda%20bisa%20tersadar%20dan%20berusaha%20memperbaiki%20kesalahannya%0A%0ASekian%20dari%20Kami.%0AWassalamualaikum%20Warohmatullahi%20Wabarokatuh";

            const url = "https://api.whatsapp.com/send?phone=<?= $dt['walsan'] ?>&text=Assalamualaikum%20Warohmatullahi%20Wabarokatuh%20Bapak%2FIbu%0A%0AKami%20dari%20pihak%20Mahad%20Tsurayya%20ingin%20melaporkan%20bahwasanya%20ananda%20*"+ nis +"*%20telah%20melakukan%20pelanggaran%20berupa%20*"+ pelanggaran +"*.%20Pada%20*"+ waktu +"*.%20Yang%20disaksikan%20oleh%20*"+ name +"*%20*("+ saksi +")*%0A%0AKami%20telah%20memberikan%20teguran%20kepada%20ananda.%20Semoga%20ananda%20bisa%20tersadar%20dan%20berusaha%20memperbaiki%20kesalahannya.%0A%0ACatatan%"+ catatan +"%3A%20%22%22%0A%0ASekian%20dari%20Kami.%0AWassalamualaikum%20Warohmatullahi%20Wabarokatuh";

            window.open(url);
        }
    </script>

<?php
require_once "../template/footer.php";
?>