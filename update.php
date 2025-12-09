<?php
include 'db.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];

$query = "UPDATE mahasiswa SET nama='$nama', nim='$nim' WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil diupdate";
} else {
    echo "Gagal mengupdate data";
}
?>