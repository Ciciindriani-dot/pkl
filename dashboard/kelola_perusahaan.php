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
   AMBIL DATA PERUSAHAAN
========================= */
$query = $conn->query("
    SELECT *
    FROM perusahaan
    ORDER BY id DESC
");

?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Kelola Perusahaan
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

    <a href="admin.php">
        Dashboard
    </a>

    <a href="validasi_pkl.php">
        Validasi PKL
    </a>

    <a href="data_siswa.php">
        Data Siswa
    </a>

    <a href="kelola_perusahaan.php"
       class="active">
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
                Kelola Perusahaan
            </h1>

            <p>
                Kelola data perusahaan tempat PKL
            </p>

        </div>

        <a href="tambah_perusahaan.php"
           class="btn-primary">

            + Tambah Perusahaan

        </a>

    </div>

    <!-- CARD -->
    <div class="card">

        <div class="card-title">
            Daftar Perusahaan
        </div>

        <div class="table-container">

            <table class="table-pkl">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Bidang</th>
                        <th>Alamat</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                <?php
                $no = 1;

                while($row = $query->fetch_assoc()):
                ?>

                    <tr>

                        <td>
                            <?= $no++; ?>
                        </td>

                        <td>

                            <div class="company-name">
                                <?= $row['nama_perusahaan']; ?>
                            </div>

                        </td>

                        <td>

                            <span class="bidang-badge">
                                <?= $row['bidang']; ?>
                            </span>

                        </td>

                        <td>

                            <div class="alamat-text">
                                <?= $row['alamat']; ?>
                            </div>

                        </td>

                        <td>

                            <div class="action-group">

                                <a href="edit_perusahaan.php?id=<?= $row['id']; ?>"
                                   class="btn-edit">

                                    Edit

                                </a>

                                <a href="hapus_perusahaan.php?id=<?= $row['id']; ?>"
                                   class="btn-delete"
                                   onclick="return confirm('Yakin ingin menghapus perusahaan ini?')">

                                    Hapus

                                </a>

                            </div>

                        </td>

                    </tr>

                <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>