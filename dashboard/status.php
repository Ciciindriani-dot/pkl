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

$user_id = $_SESSION['user']['id'];

/* =========================
   AMBIL DATA STATUS PKL
========================= */
$query = $conn->query("
    SELECT 
        pendaftaran_pkl.status,
        perusahaan.nama_perusahaan

    FROM pendaftaran_pkl

    JOIN siswa
    ON pendaftaran_pkl.siswa_id = siswa.id

    JOIN perusahaan
    ON pendaftaran_pkl.perusahaan_id = perusahaan.id

    WHERE siswa.user_id = '$user_id'
");

$data = $query->fetch_assoc();

?>

<!DOCTYPE html>
<html lang='id'>
<head>

<meta charset='UTF-8'>

<meta name='viewport'
      content='width=device-width, initial-scale=1.0'>

<title>
Status PKL
</title>

<link rel="stylesheet"
      href="../assets/style.css">

<style>

.status-badge{

    display:inline-block;

    padding:12px 22px;

    border-radius:999px;

    font-weight:600;

    margin-top:10px;
}

.pending{

    background:#fef3c7;
    color:#92400e;
}

.diterima{

    background:#dcfce7;
    color:#166534;
}

.ditolak{

    background:#fee2e2;
    color:#991b1b;
}

.kosong{

    background:#e5e7eb;
    color:#374151;
}

</style>

</head>
<body>

<div class="container">

    <div class="register-header">

        <div class="logo-circle">
            PKL
        </div>

        <h2>
            Status PKL
        </h2>

    </div>

    <div class="form-section">

        <div class="section-title">
            Perusahaan
        </div>

        <input 
            type="text"
            value="<?= $data['nama_perusahaan'] ?? 'Belum ada pengajuan'; ?>"
            readonly
        >

        <div class="section-title">
            Status Pengajuan
        </div>

        <?php

        if(!$data){

            echo "
            <div class='status-badge kosong'>
                Belum Mengajukan
            </div>
            ";

        }

        elseif($data['status'] == 'pending'){

            echo "
            <div class='status-badge pending'>
                Pending
            </div>
            ";

        }

        elseif($data['status'] == 'diterima'){

            echo "
            <div class='status-badge diterima'>
                Diterima
            </div>
            ";

        }

        else{

            echo "
            <div class='status-badge ditolak'>
                Ditolak
            </div>
            ";

        }

        ?>

    </div>

    <a href="siswa.php">

        <button type="button">
            Kembali ke Dashboard
        </button>

    </a>

</div>

</body>
</html>