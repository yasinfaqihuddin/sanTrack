<?php

require_once "../config.php";

$nis = $_GET['nis'];

$query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE nis = '$nis'");
while ($data = mysqli_fetch_array($query)) { ?>
    <tr><td></td><input type="hidden" name="nama" value="<?= $data['nama'] ?>"></tr>
<?php
}
?>