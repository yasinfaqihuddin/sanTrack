<?php
require_once "../config.php";

$plgrn = $_GET['plgrn'];

$query = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggaran WHERE pelanggaran = '$plgrn'");
while ($data = mysqli_fetch_array($query)) { ?>
    <tr>
        <td></td><input type="hidden" name="jenis" id="kategori" value="<?= $data['jenis'] ?>">
        <td></td><input type="hidden" name="poin" id="poin" value="<?= $data['poin'] ?>">
    </tr>
<?php
}
?>