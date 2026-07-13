<?php
session_start();

include "../config/database.php";

/* =========================
   PHPMailer
========================= */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

/* =========================
   AMBIL DATA FORM
========================= */

$email = $_POST['email'];
$password = $_POST['password'];

/* =========================
   CEK USER
========================= */

$stmt = $conn->prepare("
    SELECT * FROM users 
    WHERE email = ?
");

$stmt->bind_param("s", $email);

$stmt->execute();

$result = $stmt->get_result();

/* =========================
   JIKA USER ADA
========================= */

if($result->num_rows > 0){

    $user = $result->fetch_assoc();

    /* =========================
       CEK PASSWORD
    ========================= */

    if(password_verify($password, $user['password'])){

        // SIMPAN SESSION
        $_SESSION['user'] = $user;

        /* =========================
           KIRIM EMAIL LOGIN
        ========================= */

        $mail = new PHPMailer(true);

        try {

            // SERVER
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;

            // EMAIL GMAIL KAMU
            $mail->Username   = 'fakhrulrozi322@gmail.com';

            // APP PASSWORD
            $mail->Password   = 'auui znbf eiwd qmkq';

            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // PENGIRIM
            $mail->setFrom(
                'Apolloastro1106@gmail.com',
                'e-PKL System'
            );

            // PENERIMA
            $mail->addAddress($user['email']);

            // ISI EMAIL
            $mail->isHTML(true);

            $mail->Subject = 'Notifikasi Login e-PKL';

            $mail->Body = "
                <h2>Login Berhasil</h2>

                <p>Halo <b>{$user['name']}</b>,</p>

                <p>
                    Akun Anda baru saja login
                    ke sistem e-PKL.
                </p>

                <p>
                    <b>Waktu:</b>
                    ".date('d M Y H:i:s')."
                </p>

                <hr>

                <small>
                    Jika ini bukan Anda,
                    segera ubah password akun.
                </small>
            ";

            $mail->send();

        } catch (Exception $e) {

            // EMAIL GAGAL TETAP LOGIN
        }

        /* =========================
           CEK ROLE
        ========================= */

        // SISWA
        if($user['role'] == 'siswa'){

            header("Location: ../dashboard/siswa.php");
            exit;

        }

        // ADMIN
        elseif($user['role'] == 'admin'){

            header("Location: ../dashboard/admin.php");
            exit;

        }

        // KEPSEK
        elseif($user['role'] == 'kepsek'){

            header("Location: ../dashboard/kepsek.php");
            exit;

        }

        // ROLE TIDAK DIKENALI
        else{

            echo "
            <script>
                alert('Role tidak dikenali!');
                window.location='login.php';
            </script>
            ";

        }

    }

    // PASSWORD SALAH
    else{

        echo "
        <script>
            alert('Password salah!');
            window.location='login.php';
        </script>
        ";

    }

}

/* =========================
   USER TIDAK ADA
========================= */

else{

    echo "
    <script>
        alert('User tidak ditemukan!');
        window.location='login.php';
    </script>
    ";

}
?>