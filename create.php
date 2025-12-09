<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

require 'db.php'; 

if (!$koneksi) {
    die("FATAL: Variabel \$koneksi tidak ditemukan atau gagal terhubung.");
}

if (empty($_POST)) {
    echo "DEBUG INFO: \$_POST kosong. ";
    
    $rawInput = file_get_contents("php://input");
    if (!empty($rawInput)) {
        echo "Tapi ada data RAW JSON: " . $rawInput;
    } else {
        echo "Browser tidak mengirim data apa pun.";
    }
    exit; // Stop proses di sini
}

$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$nim  = isset($_POST['nim']) ? $_POST['nim'] : '';

echo "DEBUG DATA: Nama = [$nama], NIM = [$nim] || ";

if(empty($nama) || empty($nim)) {
    echo "GAGAL: Data nama atau nim kosong.";
    exit;
}

$query = "INSERT INTO mahasiswa (nama, nim) VALUES ('$nama', '$nim')";

if (mysqli_query($koneksi, $query)) {
    echo "STATUS: SUKSES (Data berhasil disimpan)";
} else {
    // Tampilkan error SQL spesifik
    echo "STATUS: ERROR SQL -> " . mysqli_error($koneksi);
}

?>
