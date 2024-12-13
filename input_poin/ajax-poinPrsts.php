<?php
require_once "../config.php";

$prestasi = $_GET['prsts'];

$query = mysqli_query($koneksi, "SELECT * FROM tbl_prestasi WHERE prestasi = '$prestasi'");
while ($data = mysqli_fetch_array($query)) { ?>
    <tr>
        <td></td><input type="text" name="kategori" id="kategori" value="<?= $data['kategori'] ?>">
        <td></td><input type="text" name="poin" id="poin" value="<?= $data['poin'] ?>">
    </tr>
<?php
}
?>