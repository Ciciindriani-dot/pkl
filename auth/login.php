<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Login PKL
    </title>

    <link rel="stylesheet"
          href="../assets/style.css">

</head>
<body>

<div class="container">

    <div class="login-header">

        <div class="logo-circle">
            PKL
        </div>

    </div>

    <form action="proses_login.php"
          method="POST">

        <input 
            type="email"
            name="email"
            placeholder="Masukkan email"
            required
        >

        <input 
            type="password"
            name="password"
            placeholder="Masukkan password"
            required
        >

        <button type="submit">

            Login

        </button>

    </form>

    <div class="register-link">

        Belum punya akun?

        <a href="register.php">
            Register
        </a>

    </div>

</div>

</body>
</html>