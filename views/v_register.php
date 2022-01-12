<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles/register.css">

    <title>Pathalum</title>
</head>
<body>
    <div class="header">
        <ul class="nav">
          <li class="nav-item navbar-brand">
            <img src="../assets/logo/CASADEV.svg" alt="" width="90" height="90" class="casa-logo">
          </li>
          <li class="nav-item navbar-brand">
            <img src="../assets/logo/x.png" alt="" width="25" height="25" class="cross">
          </li>
            <li class="nav-item navbar-brand">
              <img src="../assets/logo/SMKN4.svg" alt="" width="60" height="60" class="smkn4">
            </li>
        </ul>
    </div>

    <div class="main-container">

        <form action="register.php" method="POST" class="box-form">
            <h3 style="text-align: center;">Silakan Daftarkan Diri Anda</h3>
            <br/>
            <label for="email" id="email-label">
                <img src="https://img.icons8.com/material-rounded/24/000000/new-post.png"/>
                Email<span id="wajib">*</span>
                <input name="email" class="form-control" type="text" id="email" placeholder="Masukkan email anda" required />
            </label>

            <label for="username" id="username-label">
                <img src="https://img.icons8.com/material-rounded/24/000000/name.png"/>
                Username<span id="wajib">*</span>
                <input name="username" class="form-control" type="text" id="username" placeholder="Masukkan username anda" required />
            </label>

            <label for="nama_lengkap" id="nama_lengkap-label">
                <img src="https://img.icons8.com/material-rounded/24/000000/name.png"/>
                Nama Lengkap<span id="wajib">*</span>
                <input name="nama_lengkap" class="form-control" type="text" id="nama_lengkap" placeholder="Masukkan nama lengkap anda" required />
            </label>

            <label for="password" id="password-label">
                <img src="https://img.icons8.com/material-rounded/24/000000/lock--v1.png"/>
                Password<span id="wajib">*</span>
                <input name="password" class="form-control" type="password" id="password" placeholder="Masukkan password anda" required />
            </label>

            <label for="konfirm_password" id="konfirm_password-label">
                <img src="https://img.icons8.com/material-rounded/24/000000/lock--v1.png"/>
                Konfirmasi Password<span id="wajib">*</span>
                <input name="konfirm_password" class="form-control" type="password" id="konfirm_password" placeholder="Konfirmasi password anda" required />
            </label>

            <div class="button-login">
              <button class="btn btn-primary btn-daftar" type="submit" name="daftar" value="daftar">Daftar</button>
            </div>

            <a href="login.php" style="text-decoration: none;">
              <button class="btn btn-primary btn-masuk" type="button">Sudah memiliki akun?</button>
            </a>

        </form>
    </div>
</body>
</html>