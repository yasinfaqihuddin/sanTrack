<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Input Prestasi";
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
                <li class="breadcrumb-item active">Input Prestasi</li>
            </ol>
            <form onsubmit="sendMessage()">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-list"></i> Input Prestasi</span>
                        <button type="submit" name="simpan" id="btnKirim" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-rotate-right"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="fa-solid fa-calendar-days fa-sm"></i></span>
                                    <input type="date" name="tanggal" id="date" class="form-control" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="fa-solid fa-user fa-sm"></i></span>
                                    <select name="nis" id="nis" class="form-select" required>
                                        <option value="" hidden>Pilih Santri</option>
                                        <?php
                                        $querySiswa = mysqli_query($koneksi,"SELECT * FROM tbl_siswa");
                                        while($data = mysqli_fetch_array($querySiswa)) { ?>
                                            <option value="<?= $data['nis'] ?>"><?= $data['nis'] . '-' . $data['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="hidden">
                                    
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="fas fa-award"></i></span>
                                    <select name="prestasi" id="prestasi" class="form-select" required>
                                        <option value="" hidden>Prestasi</option>
                                        <?php
                                        $queryPrestasi = mysqli_query($koneksi, "SELECT * FROM tbl_prestasi");
                                        while ($data = mysqli_fetch_array($queryPrestasi)) { ?>
                                            <option value="<?= $data['prestasi'] ?>"><?= $data['prestasi'] . '-' . $data['poin']  ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="mb-2 input-group">
                                    <textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control" placeholder="Catatan.."></textarea>
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

        nis.addEventListener('change', function() {
            let ajax = new XMLHttpRequest();

            ajax.onreadystatechange = function() {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    hidden.innerHTML = ajax.responseText;
                }
            }
            ajax.open('GET', 'ajax-prestasi.php?nis=' + nis.value, true);
            ajax.send();
        });

        function sendMessage() {
            const date      = document.getElementById("date").value;
            const nama      = document.getElementById("namaSantri").value;
            const prestasi  = document.getElementById("prestasi").value;
            const catatan   = document.getElementById("catatan").value;
            const phone     = document.getElementById("phone").value;

            const url = "https://api.whatsapp.com/send?phone="+ phone +"&text=Assalamualaikum%20Warohmatullahi%20Wabarokatuh%20Bapak%2FIbu%0A%0AKami%20dari%20pihak%20Mahad%20ingin%20memberitahukan%20kabar%20gembira%20bahwasanya%20ananda%20*"+ nama +"*%20pada%20*2024-12-11*%20telah%20mendapatkan%20prestasi%20berupa%20*"+ prestasi +"*.%0AKami%20berharap%20semoga%20ananda%20bisa%20menjaga%20istiqomah%20menjalankan%20kebaikan-kebaikan%0A%0ACatatan%3A%20*"+ catatan +"*%0A%0ASekian%20dari%20Kami.%0AWassalamualaikum%20Warohmatullahi%20Wabarokatuh";

            window.open(url);
        }
    </script>

<?php
require_once "../template/footer.php";
?>