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
   AMBIL DATA PENDAFTARAN
========================= */
$query = $conn->query("
    SELECT 
        pendaftaran_pkl.*,
        siswa.nis,
        siswa.kelas,
        siswa.jurusan,
        users.name,
        perusahaan.nama_perusahaan

    FROM pendaftaran_pkl

    JOIN siswa
    ON pendaftaran_pkl.siswa_id = siswa.id

    JOIN users
    ON siswa.user_id = users.id

    JOIN perusahaan
    ON pendaftaran_pkl.perusahaan_id = perusahaan.id

    ORDER BY pendaftaran_pkl.id DESC
");

?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Validasi PKL
    </title>

    <link rel="stylesheet" href="../assets/dashboard.css">

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

    <a href="validasi_pkl.php"
       class="active">

        Validasi PKL

    </a>

    <a href="data_siswa.php">
        Data Siswa
    </a>

    <a href="kelola_perusahaan.php">
        Kelola Perusahaan
    </a>

    <a href="#">
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
                Validasi PKL
            </h1>

            <p>
                Kelola pengajuan PKL siswa
            </p>

        </div>

    </div>

    <!-- CARD -->
    <div class="card">

        <div class="card-title">
            Data Pengajuan PKL
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
                        <th>Perusahaan</th>
                        <th>Status</th>
                        <th>Aksi</th>

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
                            <?= $row['nama_perusahaan']; ?>
                        </td>

                        <!-- STATUS -->
                        <td>

                            <?php
                            if($row['status'] == 'pending'){
                                echo "
                                <span class='status pending'>
                                    Pending
                                </span>
                                ";
                            }

                            elseif($row['status'] == 'diterima'){
                                echo "
                                <span class='status diterima'>
                                    Diterima
                                </span>
                                ";
                            }

                            else{
                                echo "
                                <span class='status ditolak'>
                                    Ditolak
                                </span>
                                ";
                            }
                            ?>

                        </td>

                        <!-- AKSI -->
                        <td>

                            <?php
                            if($row['status'] == 'pending') :
                            ?>

                            <div class="action-group">

                                <a 
                                    href="proses_validasi.php?id=<?= $row['id']; ?>&aksi=diterima"
                                    class="btn-terima">

                                    Terima

                                </a>

                                <a 
                                    href="proses_validasi.php?id=<?= $row['id']; ?>&aksi=ditolak"
                                    class="btn-tolak">

                                    Tolak

                                </a>

                            </div>

                            <?php else : ?>

                                <span class="done-text">
                                    Selesai
                                </span>

                            <?php endif; ?>

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