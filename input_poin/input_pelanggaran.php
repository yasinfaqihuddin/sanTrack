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
                <form onsubmit="sendMessage()" action="proses_input.php" method="POST">
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
                                                <option value="<?= $data['nis'] ?>"><?= $data['nis'] . '-' . $data['nama'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div id="hidden">

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
                                    <div id="poin">

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
                                        <input type="text" name="pelapor" id="pelapor" class="form-control" placeholder="Nama saksi">
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

    <script>

        const nis   = document.getElementById('nis');
        const hidden= document.getElementById('hidden');
        const plgrn = document.getElementById('pelanggaran');
        const poin  = document.getElementById('poin');

        nis.addEventListener('change', function() {
            let ajax = new XMLHttpRequest();

            ajax.onreadystatechange = function() {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    hidden.innerHTML = ajax.responseText;
                }
            }
            ajax.open('GET', 'ajax-pelanggaran.php?nis=' + nis.value, true);
            ajax.send();
        });

        plgrn.addEventListener('change', function() {
            let ajax = new XMLHttpRequest();

            ajax.onreadystatechange = function() {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    poin.innerHTML = ajax.responseText;
                }
            }
            ajax.open('GET', 'ajax-poinPlgrn.php?plgrn=' + plgrn.value, true);
            ajax.send();
        });

        function sendMessage() {
            const date      = document.getElementById("date").value;
            const sekolah   = document.getElementById("namaSekolah").value;
            const nis       = document.getElementById("nis").value;
            const nama      = document.getElementById("namaSantri").value;
            const pelanggaran= document.getElementById("pelanggaran").value;
            const kategori  = document.getElementById("kategori").value;
            const poin      = document.getElementById("poin").value;
            const waktu     = document.getElementById("waktu").value;
            const saksi     = document.getElementById("saksi").value;
            const nmPelapor = document.getElementById("pelapor").value;
            const catatan   = document.getElementById("catatan").value;
            const phone     = document.getElementById("phone").value;

            const url = "https://api.whatsapp.com/send?phone="+ phone +"&text=Assalamualaikum%20Warohmatullahi%20Wabarokatuh%20Bapak%2FIbu%0A%0AKami%20dari%20pihak%20*"+ sekolah +"*%20ingin%20melaporkan%20bahwasanya%20pada%20*"+ date +"*%20ananda%20*"+ nama +"*%20telah%20melakukan%20pelanggaran%20berupa%20*"+ pelanggaran +"*.%20Pada%20*"+ waktu +"*.%20Ananda%20disaksikan%20oleh%20*"+ nmPelapor +"*(*"+ saksi +"*).%0A%0AKami%20telah%20memberikan%20teguran%20kepada%20ananda.%20Semoga%20ananda%20segera%20berusaha%20memperbaiki%20kesalahannya.%0A%0ACatatan%3A%20*"+ catatan +"*%0A%0ASekian%20dari%20kami%0AWassalamualaikum%20Warohmatullahi%20Wabarokatuh";

            window.open(url);
        }
    </script>

<?php
require_once "../template/footer.php";
?>