<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles/main.css">

    <title>Pathalum</title>
</head>
<body>


<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="../assets/logo/SMKN4.svg" alt="" width="50" height="50" class="smkn4">
                SMKN 4 BANDUNG
            </div>

            <?php
                $page = @$_GET['page'];
            ?>

            <ul class="list-unstyled components">
                <li <?php if($page == "home" || $page == "") echo "class='active'";?>>
                    <a href="?page=home">
                        <img src="https://img.icons8.com/material-rounded/24/ffffff/home.png"/>    
                        Halaman Utama
                    </a>
                </li>
                <li <?php if($page == "postingan") echo "class='active'";?>>
                    <a href="?page=postingan">
                        <img src="https://img.icons8.com/material-rounded/24/ffffff/edit--v1.png"/>    
                        Postingan
                    </a>
                </li>
                <li <?php if($page == "loker") echo "class='active'";?>>
                    <a href="?page=loker">
                        <img src="https://img.icons8.com/material-rounded/24/ffffff/briefcase.png"/>
                        Lowongan Kerja
                    </a>
                </li>

                <li>
                    <hr class="solid" />
                </li>

                <li <?php if($page == "profil") echo "class='active'";?>>
                    <a href="?page=profil&tab=akun">
                        <img src="https://img.icons8.com/material-rounded/24/ffffff/user--v1.png"/>
                        Profil
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <img src="https://img.icons8.com/material-rounded/24/ffffff/exit.png"/>    
                        Keluar
                    </a>
                </li>
            </ul>

        
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <?php
                if($page == "home" || $page == ""){
                    include "v_home_alumni.php";
                } else if ($page == "profil"){
                    include "v_profil.php";
                } else if ($page == "postingan"){
                    include "v_postingan_alumni.php";
                } else if($page == "loker"){
                    include "v_loker_alumni.php";
                } else {
                    echo "404 Halaman Tidak Ditemukan";
                }
            ?>
        </div>
    </div>

</body>
</html>