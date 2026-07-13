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
   PROSES TAMBAH
========================= */
if(isset($_POST['submit'])){

    $nama       = $_POST['nama_perusahaan'];
    $alamat     = $_POST['alamat'];
    $bidang     = $_POST['bidang'];
    $deskripsi  = $_POST['deskripsi'];

    $query = $conn->query("
        INSERT INTO perusahaan
        (
            nama_perusahaan,
            alamat,
            bidang,
            deskripsi
        )

        VALUES
        (
            '$nama',
            '$alamat',
            '$bidang',
            '$deskripsi'
        )
    ");

    if($query){

        header("Location: kelola_perusahaan.php");
        exit;

    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>
Tambah Perusahaan
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

    <a href="perusahaan.php"
       class="active">
        Kelola Perusahaan
    </a>
    <a href="laporan.php">
        laporan pkl
    </a>

    <a href="../auth/logout.php">
        Logout
    </a>

</div>

<!-- MAIN -->
<div class="main">

    <div class="topbar">

        <div>

            <h1>
                Tambah Perusahaan
            </h1>

            <p>
                Tambahkan data perusahaan baru
            </p>

        </div>

    </div>

    <!-- FORM -->
    <div class="card form-card">

        <form method="POST">

            <div class="form-group">

                <label>
                    Nama Perusahaan
                </label>

                <input type="text"
                       name="nama_perusahaan"
                       required>

            </div>

            <div class="form-group">

                <label>
                    Bidang
                </label>

                <select name="bidang"
                        required>

                    <option value="">
                        -- Pilih Bidang --
                    </option>

                    <option value="RPL">
                    RPL (Rekayasa Perangkat Lunak)
                    </option>

                    <option value="TKJ">
                    TKJ (Teknik Komputer dan Jaringan)
                    </option>

                    <option value="DKV">
                    DKV (Desain Komunikasi Visual)
                    </option>

                    <option value="AKL">
                    AKL (Akuntansi dan Keuangan Lembaga)
                    </option>

                    <option value="MPLB">
                    MPLB (Manajemen Perkantoran dan Layanan Bisnis)
                    </option>

                    <option value="TKRO">
                    TKRO (Teknik Kendaraan Ringan Otomotif)
                    </option>

                    <option value="TBSM">
                    TBSM (Teknik dan Bisnis Sepeda Motor)
                    </option>

                    <option value="TM">
                    TM (Teknik Mesin)
                    </option>
                </select>

            </div>

            <div class="form-group">

                <label>
                    Alamat
                </label>

                <textarea name="alamat"
                          required></textarea>

            </div>

            <div class="form-group">

                <label>
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          required></textarea>

            </div>

            <button type="submit"
                    name="submit"
                    class="btn-submit">

                Simpan Perusahaan

            </button>

        </form>

    </div>

</div>

</body>
</html>