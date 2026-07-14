<?php
session_start();
include "../config/database.php";

if (!isset($_SESSION['user'])) {

    header("Location: ../auth/login.php");
    exit;

}

$user_id = $_SESSION['user']['id'];

/* =========================
   AMBIL DATA SISWA
========================= */
$querySiswa = $conn->query("
    SELECT siswa.*, users.name
    FROM siswa
    JOIN users ON siswa.user_id = users.id
    WHERE siswa.user_id = '$user_id'
");

$siswa = $querySiswa->fetch_assoc();

$jurusan = $siswa['jurusan'];

/* =========================
   TEMPAT REKOMENDASI
========================= */
$rekomendasi = $conn->query("
    SELECT * FROM perusahaan
    WHERE bidang = '$jurusan'
");

/* =========================
   SEMUA TEMPAT PKL
========================= */
$semua = $conn->query("
    SELECT * FROM perusahaan
");

?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Daftar PKL
    </title>

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

    <a href="siswa.php">
        Dashboard
    </a>

    <a href="daftar_pkl.php"
       class="active">

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
     MAIN CONTENT
========================= -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">

        <div>

            <h1>
                Daftar PKL
            </h1>

            <p>
                Pilih satu tempat PKL
                sesuai rekomendasi atau
                secara manual
            </p>

        </div>

    </div>

    <!-- =========================
         CONTAINER
    ========================= -->
    <div class="card daftar-container">

        <!-- FORM -->
        <form action="proses_daftar.php"
              method="POST">

            <!-- =========================
                 TEMPAT REKOMENDASI
            ========================= -->
            <div class="form-section">

                <div class="form-title">
                    Tempat Rekomendasi
                </div>

                <div class="form-subtitle">

                    Rekomendasi perusahaan
                    berdasarkan jurusan
                    <?= $jurusan; ?>

                </div>

                <div class="form-group">

                    <select 
                        id="rekomendasiSelect"
                        name="perusahaan_id"
                        onchange="pilihRekomendasi()"
                    >

                        <option value="">
                            -- Pilihan Rekomendasi --
                        </option>

                        <?php
                        mysqli_data_seek($rekomendasi, 0);

                        while($row = $rekomendasi->fetch_assoc()) :
                        ?>

                            <option value="<?= $row['id']; ?>">

                                <?= $row['nama_perusahaan']; ?>

                            </option>

                        <?php endwhile; ?>

                    </select>

                </div>

                <div class="rekomendasi-box">

                    <p>
                        Sistem memberikan
                        rekomendasi perusahaan
                        yang sesuai dengan jurusan
                        siswa agar kegiatan PKL
                        lebih relevan dengan
                        kompetensi yang dipelajari.
                    </p>

                </div>

            </div>

            <!-- LINE -->
            <div class="line"></div>

            <!-- =========================
                 SEMUA TEMPAT PKL
            ========================= -->
            <div class="form-section">

                <div class="form-title">
                    Semua Tempat PKL
                </div>

                <div class="form-subtitle">

                    Pilih perusahaan lain jika
                    tidak mengambil rekomendasi

                </div>

                <div class="form-group">

                    <select 
                        id="semuaSelect"
                        name="perusahaan_id"
                        onchange="pilihSemua()"
                    >

                        <option value="">
                            -- Pilih Perusahaan --
                        </option>

                        <?php while($all = $semua->fetch_assoc()) : ?>

                            <option value="<?= $all['id']; ?>">

                                <?= $all['nama_perusahaan']; ?>

                            </option>

                        <?php endwhile; ?>

                    </select>

                </div>

            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="btn-daftar">

                Daftar PKL

            </button>

        </form>

    </div>

</div>

<!-- =========================
     SCRIPT LOCK
========================= -->
<script>

function pilihRekomendasi(){

    const rekom =
    document.getElementById(
        "rekomendasiSelect"
    );

    const semua =
    document.getElementById(
        "semuaSelect"
    );

    if(rekom.value !== ""){

        semua.disabled = true;

    }else{

        semua.disabled = false;

    }

}

function pilihSemua(){

    const rekom =
    document.getElementById(
        "rekomendasiSelect"
    );

    const semua =
    document.getElementById(
        "semuaSelect"
    );

    if(semua.value !== ""){

        rekom.disabled = true;

    }else{

        rekom.disabled = false;

    }

}

</script>

</body>
</html>