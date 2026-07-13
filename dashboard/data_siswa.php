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
   AMBIL DATA SISWA
========================= */
$query = $conn->query("
    SELECT 
        siswa.*,
        users.name

    FROM siswa

    JOIN users
    ON siswa.user_id = users.id

    ORDER BY siswa.id DESC
");

?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Data Siswa
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

    <a href="data_siswa.php"
       class="active">

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
                Data Siswa
            </h1>

            <p>
                Kelola data seluruh siswa PKL
            </p>

        </div>

    </div>

    <!-- CARD -->
    <div class="card">

        <div class="card-title">
            Daftar Siswa
        </div>

        <div class="table-container">

            <table class="table-pkl">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>

                    </tr>

                </thead>

                <tbody>

                    <?php
                    $no = 1;

                    while($row = $query->fetch_assoc()) :
                    ?>

                    <tr>

                        <td>
                            <?= $no++; ?>
                        </td>

                        <td>
                            <?= $row['name']; ?>
                        </td>

                        <td>
                            <?= $row['nis']; ?>
                        </td>

                        <td>
                            <?= $row['kelas']; ?>
                        </td>

                        <td>
                            <?= $row['jurusan']; ?>
                        </td>

                        <td>
                            <?= $row['jenis_kelamin']; ?>
                        </td>

                        <td>
                            <?= $row['no_hp']; ?>
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