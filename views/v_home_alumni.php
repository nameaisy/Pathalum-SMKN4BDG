<?php
    include "../lib/library.php";

    $user = $_SESSION['id_user'];
    $sql = "SELECT * FROM alumni, users where alumni.id_users = " . $user;
    $data = $mysqli -> query($sql) or die($mysqli->error);
    $row = mysqli_fetch_array($data);

?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/halaman_utama.css">

    <title>Pathalum</title>
</head>
<body>
    <div class="welcome">
        <img src="../assets/wb-waves.png" alt="" class="welcome-img">
        <img src="https://img.icons8.com/material-rounded/48/000000/student-male.png" id="student"/>
        <h3 style="text-align: center;">
            Halo, <?php echo $row['nama_lengkap']; ?>
        </h3>
        <h5 style="text-align: center;">
            Selamat datang di Pathalum!
        </h5>
    </div>
</body>
</html>