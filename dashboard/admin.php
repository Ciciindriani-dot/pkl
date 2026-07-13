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
   CEK ROLE
========================= */
if ($_SESSION['user']['role'] != 'admin') {

    exit("Akses ditolak!");

}

/* =========================
   TOTAL SISWA
========================= */
$totalSiswa = $conn->query("
    SELECT COUNT(*) as total
    FROM siswa
")->fetch_assoc();

/* =========================
   TOTAL PENGAJUAN
========================= */
$totalPengajuan = $conn->query("
    SELECT COUNT(*) as total
    FROM pendaftaran_pkl
")->fetch_assoc();

/* =========================
   TOTAL DITERIMA
========================= */
$totalDiterima = $conn->query("
    SELECT COUNT(*) as total
    FROM pendaftaran_pkl
    WHERE status='diterima'
")->fetch_assoc();

/* =========================
   TOTAL DITOLAK
========================= */
$totalDitolak = $conn->query("
    SELECT COUNT(*) as total
    FROM pendaftaran_pkl
    WHERE status='ditolak'
")->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>
Dashboard Admin
</title>

<link rel="stylesheet"
      href="../assets/dashboard.css">

</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">
        Admin Panel
    </div>

    <a href="admin.php"
       class="active">

        Dashboard

    </a>

    <a href="validasi_pkl.php">

        Validasi PKL

    </a>

    <a href="data_siswa.php">

        Data Siswa

    </a>

    <a href="kelola_perusahaan.php">

        Kelola Perusahaan

    </a>

    <a href="laporan.php">

        Laporan PKL

    </a>

    <a href="../auth/logout.php">

        Logout

    </a>

</div>

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">

        <div>

            <h1>
                Dashboard Admin
            </h1>

            <p>
                Selamat datang kembali,
                <?= $_SESSION['user']['name']; ?>
            </p>

        </div>

        <div class="profile">

            <img 
                src="/rpl/assets/uploads/default.png"
                class="profile-img"
            >

            <div class="profile-info">

                <h3>
                    <?= $_SESSION['user']['name']; ?>
                </h3>

                <p>
                    Administrator
                </p>

            </div>

        </div>

    </div>

    <!-- STATISTIK -->
    <div class="stats-grid">

        <!-- CARD -->
        <div class="stats-card">

            <div class="stats-title">
                Total Siswa
            </div>

            <div class="stats-number">
                <?= $totalSiswa['total']; ?>
            </div>

            <div class="stats-desc">
                Siswa terdaftar
            </div>

        </div>

        <!-- CARD -->
        <div class="stats-card">

            <div class="stats-title">
                Pengajuan PKL
            </div>

            <div class="stats-number">
                <?= $totalPengajuan['total']; ?>
            </div>

            <div class="stats-desc">
                Total pengajuan siswa
            </div>

        </div>

        <!-- CARD -->
        <div class="stats-card success">

            <div class="stats-title">
                Diterima
            </div>

            <div class="stats-number">
                <?= $totalDiterima['total']; ?>
            </div>

            <div class="stats-desc">
                Siswa diterima PKL
            </div>

        </div>

        <!-- CARD -->
        <div class="stats-card danger">

            <div class="stats-title">
                Ditolak
            </div>

            <div class="stats-number">
                <?= $totalDitolak['total']; ?>
            </div>

            <div class="stats-desc">
                Pengajuan ditolak
            </div>

        </div>

    </div>

    <!-- INFO -->
    <div class="card admin-info">

        <div class="card-title">
            Informasi Sistem
        </div>

        <p>

            Sistem PKL digunakan untuk
            mengelola pengajuan,
            validasi, dan laporan
            Praktik Kerja Lapangan siswa.

        </p>

    </div>

</div>

</body>
</html>