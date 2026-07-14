<?php
session_start();
include "../config/database.php";

if (!isset($_SESSION['user'])) {

    header("Location: ../auth/login.php");
    exit;

}

$user_id = $_SESSION['user']['id'];

/* =========================
   DATA SISWA
========================= */

$querySiswa = $conn->query("

    SELECT 
        siswa.*,
        users.name

    FROM siswa

    JOIN users
    ON siswa.user_id = users.id

    WHERE siswa.user_id = '$user_id'

");

$siswa = $querySiswa->fetch_assoc();

/* =========================
   STATUS PKL
========================= */

$queryStatus = $conn->query("

    SELECT 
        pendaftaran_pkl.*,
        perusahaan.nama_perusahaan

    FROM pendaftaran_pkl

    JOIN perusahaan
    ON pendaftaran_pkl.perusahaan_id = perusahaan.id

    WHERE siswa_id = '{$siswa['id']}'

");

$dataPkl = [];

while($row = $queryStatus->fetch_assoc()){

    $dataPkl[] = $row;

}

?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Siswa</title>

    <link rel="stylesheet"
          href="../assets/dashboard.css">

</head>
<body>

<!-- =========================
     SIDEBAR
========================= -->

<div class="sidebar">

    <div class="logo">
        PKL System
    </div>

    <a href="siswa.php" class="active">
        Dashboard
    </a>

    <a href="daftar_pkl.php">
        Daftar PKL
    </a>

    <a href="status.php">
        Status PKL
    </a>

    <a href="../auth/logout.php">
        Logout
    </a>

</div>

<!-- =========================
     MAIN
========================= -->

<div class="main">

    <!-- TOPBAR -->

    <div class="topbar">

        <div>

            <h1>
                Halo, <?= $_SESSION['user']['name']; ?> 👋
            </h1>

            <p>
                Selamat datang kembali di sistem PKL
            </p>

        </div>

        <div class="profile">

            <img 
                src="/rpl/assets/uploads/default.png"
                class="profile-img"
            >

            <div class="profile-info">

                <h3>
                    <?= $siswa['kelas']; ?>
                </h3>

                <p>
                    <?= $siswa['jurusan']; ?>
                </p>

            </div>

        </div>

    </div>

   <!-- =========================
     INFO CARD
========================= -->

<div class="info-grid">

    <!-- STATUS PKL -->
    <div class="siswa-info-card">

        <span>Status PKL</span>

        <?php if(count($dataPkl) > 0) : ?>

            <?php foreach($dataPkl as $data) : ?>

                <div class="pendaftaran-item">

                    <strong>
                        <?= $data['nama_perusahaan']; ?>
                    </strong>

                    <br>

                    <span class="status-badge">
                        <?= ucfirst($data['status']); ?>
                    </span>

                </div>

            <?php endforeach; ?>

        <?php else : ?>

            <p style="margin-top:15px;">
                Belum daftar PKL
            </p>

        <?php endif; ?>

    </div>

    <!-- JURUSAN -->
    <div class="siswa-info-card">

        <span>Jurusan</span>

        <h2><?= $siswa['jurusan']; ?></h2>

    </div>

</div>

    <!-- =========================
         GRID CONTENT
    ========================= -->

    <div class="dashboard-grid">

        <!-- INFORMASI SISWA -->

        <div class="card">

            <div class="card-title">
                Informasi Siswa
            </div>

            <div class="student-list">

                <div class="student-item">

                    <span>Nama</span>

                    <strong>
                        <?= $_SESSION['user']['name']; ?>
                    </strong>

                </div>

                <div class="student-item">

                    <span>NIS</span>

                    <strong>
                        <?= $siswa['nis']; ?>
                    </strong>

                </div>

                <div class="student-item">

                    <span>Kelas</span>

                    <strong>
                        <?= $siswa['kelas']; ?>
                    </strong>

                </div>

                <div class="student-item">

                    <span>Jenis Kelamin</span>

                    <strong>
                        <?= $siswa['jenis_kelamin']; ?>
                    </strong>

                </div>

            </div>

        </div>

        <!-- PROGRESS -->

        <div class="card">

            <div class="card-title">
                Progress PKL
            </div>

            <div class="timeline">

                <!-- AKUN -->

                <div class="timeline-item">

                    <div class="dot"></div>

                    <div>

                        <h4>
                            Akun dibuat
                        </h4>

                        <p>
                            Akun siswa berhasil dibuat
                        </p>

                    </div>

                </div>

                <!-- PENGAJUAN -->

                <div class="timeline-item">

                    <div class="dot"></div>

                    <div>

                        <h4>
                            Pengajuan PKL
                        </h4>

                        <?= count($dataPkl) > 0 ? 'Pengajuan telah dikirim' : 'Belum daftar PKL'; ?>

                    </div>

                </div>

                <!-- STATUS -->

                <div class="timeline-item">

                    <div class="dot"></div>

                    <div>

                        <h4>
                            Status Verifikasi
                        </h4>

                       
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- =========================
         PENGUMUMAN
    ========================= -->

    <div class="card pengumuman-card">

        <div class="card-title">
            📢 Pengumuman
        </div>

        <p>
            Pendaftaran PKL dibuka
            sampai tanggal 20 Mei 2026.
        </p>

    </div>

</div>

</body>
</html>