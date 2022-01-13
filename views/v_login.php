<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles/login.css">

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
        <form action="login.php" method="POST" class="box-form">
            <label for="email" id="email-label">
              <i class="bi bi-envelope"></i>
              Email/Username/Nama Lengkap<span id="wajib">*</span>
              <input name="email" class="form-control" type="text" id="email" placeholder="Masukkan email anda" required />
            </label>

            <label for="password" id="password-label">
              <i class="bi bi-lock-fill"></i>
              Password<span id="wajib">*</span>
              <input name="password" class="form-control" type="password" id="password" placeholder="Masukkan password anda" required />

            <div class="button-login">
              <a href="#" class="lupa-sandi">Lupa Sandi?</a>
              <button class="btn btn-primary btn-masuk" type="submit" name="masuk" value="masuk">Masuk</button>
            </div>

            <a href="register.php" style="text-decoration: none;">
              <button class="btn btn-primary btn-register" type="button">Tidak memiliki akun?</button>
            </a>

        </form>
    </div>
</body>
</html>