<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Register PKL
    </title>

    <link rel="stylesheet"
          href="../assets/style.css">

</head>
<body>

<div class="container">

    <!-- HEADER -->
    <div class="register-header">

        <div class="logo-circle">
            PKL
        </div>

        <h2>
            Register Account
        </h2>   

    </div>

    <!-- FORM -->
    <form action="proses_register.php"
          method="POST">

        <!-- INFORMASI AKUN -->
        <div class="form-section">

            <input 
                type="text" 
                name="name" 
                placeholder="Nama Lengkap"
                required
            >

            <input 
                type="email" 
                name="email" 
                placeholder="Email"
                required
            >

            <input 
                type="password" 
                name="password" 
                placeholder="Password"
                required
            >

        </div>

        <!-- INFORMASI SISWA -->
        <div class="form-section">
            <input 
                type="text" 
                name="nis" 
                placeholder="Nomor Induk Siswa"
                required
            >

            <!-- KELAS -->
            <select name="kelas" required>

                <option value="">
                    Pilih Kelas
                </option>

                <option value="XI RPL 1">
                    XI RPL 1
                </option>

                <option value="XI RPL 2">
                    XI RPL 2
                </option>

                <option value="XI TKJ 1">
                    XI TKJ 1
                </option>

                <option value="XI TKJ 2">
                    XI TKJ 2
                </option>

                <option value="XI DKV 1">
                    XI DKV 1
                </option>

                <option value="XI AKL 1">
                    XI AKL 1
                </option>

                <option value="XI AKL 2">
                    XI AKL 2
                </option>

                <option value="XI MPLB 1">
                    XI MPLB 1
                </option>

                <option value="XI TKRO 1">
                    XI TKRO 1
                </option>

                <option value="XI TKRO 2">
                    XI TKRO 2
                </option>

                <option value="XI TBSM 1">
                    XI TBSM 1
                </option>

                <option value="XI TM 1">
                    XI TM 1
                </option>

            </select>

            <!-- JURUSAN -->
            <select name="jurusan" required>

                <option value="">
                    Pilih Jurusan
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

            <select name="jenis_kelamin" required>

                <option value="">
                    Jenis Kelamin
                </option>

                <option value="Laki-laki">
                    Laki-laki
                </option>

                <option value="Perempuan">
                    Perempuan
                </option>

            </select>

            <input 
                type="text" 
                name="no_hp" 
                placeholder="Nomor HP"
            >

        </div>

        <!-- BUTTON -->
        <button type="submit">

            Daftar Sekarang

        </button>

    </form>

    <!-- LINK -->
    <div class="login-link">

        Sudah punya akun?

        <a href="login.php">
            Login di sini
        </a>

    </div>

</div>

</body>
</html>