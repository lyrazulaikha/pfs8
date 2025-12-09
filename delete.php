<?php
include 'db.php';

$id = $_POST['id'];

$query = "DELETE FROM mahasiswa WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil dihapus";
} else {
    echo "Gagal menghapus data";
}
?>