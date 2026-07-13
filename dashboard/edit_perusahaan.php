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
   AMBIL DATA PERUSAHAAN
========================= */
$query = $conn->query("
    SELECT *
    FROM perusahaan
    WHERE id = '$id'
");

$data = $query->fetch_assoc();

/* =========================
   PROSES EDIT
========================= */
if(isset($_POST['submit'])){

    $nama       = $_POST['nama_perusahaan'];
    $alamat     = $_POST['alamat'];
    $bidang     = $_POST['bidang'];
    $deskripsi  = $_POST['deskripsi'];

    $update = $conn->query("
        UPDATE perusahaan

        SET
            nama_perusahaan = '$nama',
            alamat = '$alamat',
            bidang = '$bidang',
            deskripsi = '$deskripsi'

        WHERE id = '$id'
    ");

    if($update){

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
Edit Perusahaan
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

    <a href="../auth/logout.php">
        Logout
    </a>

</div>

<!-- MAIN -->
<div class="main">

    <div class="topbar">

        <div>

            <h1>
                Edit Perusahaan
            </h1>

            <p>
                Ubah data perusahaan PKL
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
                       value="<?= $data['nama_perusahaan']; ?>"
                       required>

            </div>

            <div class="form-group">

                <label>
                    Bidang
                </label>

                <select name="bidang"
                        required>

                    <option value="RPL"
                    <?= $data['bidang'] == 'RPL' ? 'selected' : ''; ?>>
                        RPL
                    </option>

                    <option value="TKJ"
                    <?= $data['bidang'] == 'TKJ' ? 'selected' : ''; ?>>
                        TKJ
                    </option>

                    <option value="DKV"
                    <?= $data['bidang'] == 'DKV' ? 'selected' : ''; ?>>
                        DKV
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>
                    Alamat
                </label>

                <textarea name="alamat"
                          required><?= $data['alamat']; ?></textarea>

            </div>

            <div class="form-group">

                <label>
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          required><?= $data['deskripsi']; ?></textarea>

            </div>

            <button type="submit"
                    name="submit"
                    class="btn-submit">

                Update Perusahaan

            </button>

        </form>

    </div>

</div>

</body>
</html>