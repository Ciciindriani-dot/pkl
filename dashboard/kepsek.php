<?php
session_start();

if (!isset($_SESSION['user'])) {

    header("Location: ../auth/login.php");
    exit;

}

if ($_SESSION['user']['role'] != 'kepsek') {

    exit("Akses ditolak!");

}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>
Dashboard Kepsek
</title>

<link rel="stylesheet"
      href="../assets/dashboard.css">

</head>
<body>

<div class="kepsek-wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo">
            Kepsek Panel
        </div>

        <a href="kepsek.php"
           class="active">

            Dashboard

        </a>

        <a href="laporan.php">

            Laporan PKL

        </a>

        <a href="../auth/logout.php">

            Logout

        </a>

    </div>

    <!-- CONTENT -->
    <div class="kepsek-content">

        <!-- HERO -->
        <div class="hero-card">

            <h1>
                Dashboard Kepsek
            </h1>

        </div>

        <!-- CARD -->
        <div class="info-card">

            <div class="info-title">

                Halo,
                <?= $_SESSION['user']['name']; ?> 👋

            </div>

            <div class="info-text">

                Anda dapat melihat laporan
                siswa PKL yang telah diterima
                perusahaan secara realtime
                melalui sistem.

            </div>

            <a href="laporan.php"
               class="btn-laporan">

                📄 Lihat Laporan PKL

            </a>

        </div>

    </div>

</div>

</body>
</html>