<?php

session_start();

include "../config/database.php";

/* =========================
   DOMPDF
========================= */
require "../vendor/autoload.php";

use Dompdf\Dompdf;

/* =========================
   CEK LOGIN
========================= */
if (!isset($_SESSION['user'])) {

    header("Location: ../auth/login.php");
    exit;

}

/* =========================
   AMBIL DATA SISWA DITERIMA
========================= */
$query = $conn->query("

    SELECT
        users.name,
        siswa.nis,
        siswa.kelas,
        siswa.jurusan,
        perusahaan.nama_perusahaan

    FROM pendaftaran_pkl

    JOIN siswa
    ON pendaftaran_pkl.siswa_id = siswa.id

    JOIN users
    ON siswa.user_id = users.id

    JOIN perusahaan
    ON pendaftaran_pkl.perusahaan_id = perusahaan.id

    WHERE pendaftaran_pkl.status = 'diterima'

    ORDER BY users.name ASC

");

/* =========================
   HTML PDF
========================= */
$html = '

<style>

body{

    font-family: sans-serif;

    padding:20px;

}

.title{

    text-align:center;
    margin-bottom:30px;

}

.title h2{

    margin:0;
    font-size:24px;

}

.title p{

    margin:4px 0;
    color:#555;

}

table{

    width:100%;
    border-collapse:collapse;
    margin-top:20px;

}

table th{

    background:#4f46e5;
    color:white;

    padding:12px;

    font-size:14px;

}

table td{

    padding:10px;
    border:1px solid #ddd;
    font-size:13px;

}

.footer{

    margin-top:40px;
    text-align:right;

}

</style>

<div class="title">

    <h2>
        SMK NEGERI 1 LINTAU BUO
    </h2>

    <p>
        Laporan Data Praktik Kerja Lapangan
    </p>

    <p>
        Tahun Ajaran 2025 / 2026
    </p>

    <p>
        Tanggal Cetak :
        '. date("d M Y") .'
    </p>

</div>

<table>

<tr>

    <th>No</th>
    <th>Nama Siswa</th>
    <th>NIS</th>
    <th>Kelas</th>
    <th>Jurusan</th>
    <th>Perusahaan</th>

</tr>

';

$no = 1;

while($row = $query->fetch_assoc()){

$html .= '

<tr>

    <td>'.$no++.'</td>

    <td>'.$row['name'].'</td>

    <td>'.$row['nis'].'</td>

    <td>'.$row['kelas'].'</td>

    <td>'.$row['jurusan'].'</td>

    <td>'.$row['nama_perusahaan'].'</td>

</tr>

';

}

$html .= '

</table>

<div class="footer">

    <p>
        Lintau Buo,
        '. date("d M Y") .'
    </p>

    <br><br><br>

    <p>
        Admin PKL
    </p>

</div>

';

/* =========================
   GENERATE PDF
========================= */
$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

/* =========================
   TAMPILKAN PDF
========================= */
$dompdf->stream(
    "laporan_pkl.pdf",
    array("Attachment" => false)
);

?>