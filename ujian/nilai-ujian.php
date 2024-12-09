<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Nilai Ujian - Ma'had Tsurayya";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg']) && isset($_GET['nis'])) {
    $msg = $_GET['msg'];
    $nis = $_GET['nis'];
} else {
    $msg = '';
    $nis = '';
}

$alert = '';
if($msg == 'LULUS') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check"></i> SELAMAT.. siswa dengan NIS :  ' . $nis . ' berhasil LULUS UJIAN
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
if($msg == 'GAGAL') {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-xmark"></i> siswa dengan NIS : ' . $nis . ' GAGAL UJIAN
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}

$queryNoUjian = mysqli_query($koneksi, "SELECT max(no_ujian) as maxno FROM tbl_ujian");
$data = mysqli_fetch_array($queryNoUjian);
$maxno = $data['maxno'];

$noUrut = (int) substr($maxno, 4, 3);
$noUrut++;
$maxno = "UTS-" . sprintf("%03s", $noUrut);

?>

<!-- <style>
#nama {
    border: 1px solid #000;
    padding: 10px;
    margin: 10px 0;
}
</style> -->

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-7">
                    <h1 class="mt-4">Nilai Ujian</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="ujian.php">Ujian</a></li>
                        <li class="breadcrumb-item active">Nilai Ujian</li>
                    </ol>
                </div>
                <div class="col-5">
                    <div class="card mt-3 border-0">
                        <h5>Syarat Kelulusan</h5>
                        <li><small>Nilai minimal tiap mata pelajaran tidak boleh di bawah 50</small></li>
                        <li><small>Nilai rata-rata mata pelajaran tidak boleh di bawah 60</small></li>
                    </div>
                </div>
            </div>
            <?php if($msg !== "") {
                echo $alert;
            } ?>
            <form action="proses-ujian.php" method="POST">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa-solid fa-plus"></i> Data Peserta Ujian
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="fa-solid fa-rotate fa-sm"></i></span>
                                    <input type="text" name="noUjian" value="<?= $maxno ?>" class="form-control bg-transparent" readonly>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="fa-solid fa-calendar-days fa-sm"></i></span>
                                    <input type="date" name="tgl" class="form-control" required>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="fa-solid fa-user fa-sm"></i></span>
                                    <select name="nis" id="nis" class="form-select" required>
                                        <option value="" hidden>-- Pilih Santri --</option>
                                        <?php
                                        $querySiswa = mysqli_query($koneksi, "SELECT * FROM tbl_siswa");
                                        while($data = mysqli_fetch_array($querySiswa)) { ?>
                                            <option value="<?= $data['nis'] ?>">
                                                <?= $data['nis'] . '-' . $data['nama'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="container-nama">

                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="fa-solid fa-location-arrow fa-sm"></i></span>
                                    <select name="jurusan" id="jurusan" class="form-select" required>
                                        <option value="" hidden>-- Jurusan --</option>
                                        <option value="Ilmu Al-Quran">Ilmu Al-Quran</option>
                                        <option value="Bahasa Arab">Bahasa Arab</option>
                                    </select>                                
                                </div>
                            </div>
                        </div>
                        <div class="card-body border mt-2 rounded">
                            <div class="input-group p-2">
                                <span class="input-group-text col-2 ps-2 fw-bold">Total</span>
                                <input type="text" name="sum" placeholder="Total Nilai" class="form-control" id="total_nilai" required readonly>
                            </div>
                            <div class="input-group p-2">
                                <span class="input-group-text col-2 ps-2 fw-bold">Min</span>
                                <input type="text" name="min" placeholder="Nilai Terendah" class="form-control" id="nilai_terendah" required readonly>
                            </div>
                            <div class="input-group p-2">
                                <span class="input-group-text col-2 ps-2 fw-bold">Max</span>
                                <input type="text" name="max" placeholder="Nilai Tertinggi" class="form-control" id="nilai_tertinggi" required readonly>
                            </div>
                            <div class="input-group p-2">
                                <span class="input-group-text col-2 ps-2 fw-bold">Rata-rata</span>
                                <input type="text" name="avg" placeholder="Nilai Rata-rata" class="form-control" id="rata2" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa-solid fa-list"></i> Input Nilai Ujian
                                <button type="submit" name="simpan" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                <button type="reset" name="reset" class="btn btn-sm btn-danger me-1 float-end"><i class="fa-solid fa-rotate-right"></i> Reset</button>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th><center>No</center></th>
                                            <th scope="col"><center>Mata Pelajaran</center></th>
                                            <th scope="col" style="width: 20%;"><center>Nilai Ujian</center></th>
                                        </tr>
                                    </thead>
                                    <tbody id="kejuruan">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        const jurusan = document.getElementById('jurusan');
        const mapelKejuruan = document.getElementById('kejuruan');

        jurusan.addEventListener('change', function() {
            let ajax = new XMLHttpRequest();

            ajax.onreadystatechange = function () {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    mapelKejuruan.innerHTML = ajax.responseText;
                }
            }

            ajax.open('GET', 'ajax-mapel.php?jurusan=' + jurusan.value, true);
            ajax.send();
        });

        const nis = document.getElementById('nis');
        const namaSantri= document.getElementById('container-nama');

        nis.addEventListener('change', function() {
            let ajax = new XMLHttpRequest();

            ajax.onreadystatechange = function() {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    namaSantri.innerHTML = ajax.responseText;
                }
            }
            ajax.open('GET', 'ajax-nama.php?nis=' + nis.value, true);
            ajax.send();
        });

        const total = document.getElementById('total_nilai');
        const minValue = document.getElementById('nilai_terendah');
        const maxValue = document.getElementById('nilai_tertinggi');
        const average = document.getElementById('rata2');

        function fnhitung() {
            let nilaiUjian = document.getElementsByClassName('nilai');

            let totalNilai = 0;
            let listNilai = [];
            for (let i = 0; i < nilaiUjian.length; i++) {
                totalNilai = parseInt(totalNilai) + parseInt(nilaiUjian[i].value);
                total.value = totalNilai;

                listNilai.push(nilaiUjian[i].value);

                listNilai.sort(function(a, b) {
                    return a-b
                });

                minValue.value = listNilai[0];
                maxValue.value = listNilai[listNilai.length -1];
                average.value  = Math.round(totalNilai / listNilai.length);
            }
        }
    </script>

<?php
require_once "../template/footer.php";
?>