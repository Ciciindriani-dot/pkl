<?php
include "../config/database.php";

// =========================
// AMBIL DATA FORM
// =========================
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$nis = $_POST['nis'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_hp = $_POST['no_hp'];

// =========================
// CEK EMAIL
// =========================
$cek = $conn->prepare("
    SELECT id 
    FROM users 
    WHERE email = ?
");

$cek->bind_param("s", $email);
$cek->execute();

$result = $cek->get_result();

if ($result->num_rows > 0) {

    echo "Email sudah terdaftar!";
    exit;

}

// =========================
// MULAI TRANSACTION
// =========================
$conn->begin_transaction();

try {

    // =========================
    // INSERT KE USERS
    // =========================
    $stmt_user = $conn->prepare("
        INSERT INTO users
        (
            name,
            email,
            password,
            role
        )
        VALUES (?, ?, ?, 'siswa')
    ");

    $stmt_user->bind_param(
        "sss",
        $name,
        $email,
        $password
    );

    $stmt_user->execute();

    // AMBIL ID USER
    $user_id = $conn->insert_id;

    // =========================
    // INSERT KE SISWA
    // =========================
    $stmt_siswa = $conn->prepare("
        INSERT INTO siswa
        (
            user_id,
            nis,
            kelas,
            jurusan,
            jenis_kelamin,
            no_hp
        )
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    $stmt_siswa->bind_param(
        "isssss",
        $user_id,
        $nis,
        $kelas,
        $jurusan,
        $jenis_kelamin,
        $no_hp
    );

    $stmt_siswa->execute();

    // =========================
    // SIMPAN
    // =========================
    $conn->commit();

    header("Location: login.php");
    exit;

} catch (Exception $e) {

    // =========================
    // JIKA ERROR
    // =========================
    $conn->rollback();

    echo "Gagal register: " . $e->getMessage();

}
?>