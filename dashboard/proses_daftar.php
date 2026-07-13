<?php
session_start();
include "../config/database.php";

if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}

$user_id = $_SESSION['user']['id'];
$perusahaan_id = $_POST['perusahaan_id'];

// ambil id siswa
$q = $conn->query("SELECT id FROM siswa WHERE user_id = $user_id");
$siswa = $q->fetch_assoc();

if (!$siswa) {
    echo "Data siswa tidak ditemukan!";
    exit;
}

$siswa_id = $siswa['id'];

// CEK JUMLAH PENDAFTARAN
$cek = $conn->query("SELECT * FROM pendaftaran_pkl WHERE siswa_id = $siswa_id");

if ($cek->num_rows >= 3) {
    echo "Maksimal pendaftaran PKL hanya 3 perusahaan!";
    exit;
}

// SIMPAN
$conn->query("INSERT INTO pendaftaran_pkl 
(siswa_id, perusahaan_id, tanggal_daftar) 
VALUES ('$siswa_id', '$perusahaan_id', NOW())");

header("Location: status.php");
exit;
?>