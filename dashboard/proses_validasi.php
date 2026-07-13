<?php
session_start();
include "../config/database.php";

/* =========================
   CEK LOGIN
========================= */
if (!isset($_SESSION['user'])) {

    header("Location: ../auth/login.php");
    exit;

}

/* =========================
   CEK ROLE ADMIN
========================= */
if ($_SESSION['user']['role'] != 'admin') {

    exit("Akses ditolak!");

}

/* =========================
   AMBIL DATA
========================= */
$id = $_GET['id'];
$aksi = $_GET['aksi'];

/* =========================
   VALIDASI STATUS
========================= */
if(
    $aksi == 'diterima'
    ||
    $aksi == 'ditolak'
){

    $conn->query("
        UPDATE pendaftaran_pkl
        SET status = '$aksi'
        WHERE id = '$id'
    ");

}

/* =========================
   KEMBALI
========================= */
header("Location: validasi_pkl.php");
exit;
?>