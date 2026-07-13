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
   AMBIL ID
========================= */
$id = $_GET['id'];

/* =========================
   HAPUS DATA
========================= */
$hapus = $conn->query("
    DELETE FROM perusahaan
    WHERE id = '$id'
");

/* =========================
   REDIRECT
========================= */
header("Location: kelola_perusahaan.php");
exit;
?>