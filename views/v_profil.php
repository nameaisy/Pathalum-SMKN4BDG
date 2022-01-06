<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/profile.css">

    <title>Pathalum</title>
</head>

<body>

        <?php
            $tab = @$_GET['tab'];
        ?>

        <!-- Page Content  -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if($tab == "akun") echo 'active'?>">
                        <a class="page-link" href="?page=profil&tab=akun">
                            Akun
                        </a>
                    </li>
                    <li class="page-item <?php if($tab == "data") echo 'active'?>">
                        <a class="page-link" href="?page=profil&tab=data">
                            Data Diri
                        </a>
                    </li>
                    <li class="page-item <?php if($tab == "status") echo 'active'?>">
                        <a class="page-link" href="?page=profil&tab=status">
                            Status
                        </a>
                    </li>
                </ul>
            </nav>


            <?php
            include '../lib/library.php';
            ?>

            <form action="#" method="POST" class="box-form">

            <?php
                if($tab == "akun"){

                $user = $_SESSION['id'];
                $sql = " SELECT *  FROM users WHERE id='$user'";

                $data = $mysqli -> query($sql) or die($mysqli->error);

                $row = mysqli_fetch_array($data);
                
            ?>
                    <label for="email" id="email-label">
                    Email</span>
                    <input type="text" id="email" name="email" placeholder="Masukkan email anda" value="<?php echo $row['email']?>"/>
                    </label>
            
                    <label for="username" id="username-label">
                    Username</span>
                    <input type="text" id="username" name="username" placeholder="Masukkan username anda" value="<?php echo $row['username']?>"/>
                    </label>

                    <label for="nama_lengkap" id="name-label">
                    Nama Lengkap</span>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap anda" value="<?php echo $row['nama_lengkap']?>"/>
                    </label>

                    <button class="btn btn-primary btn-update" type="submit" name="update" value="update">Update Data</button>

                    <?php
                    if(isset($_POST['update'])){
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $nama_lengkap = $_POST['nama_lengkap'];

                    if(empty($email) OR empty($username) OR empty($nama_lengkap)){
                        echo "Field Tidak Boleh Kosong!";
                    } else {
                        $id = $_SESSION['id'];
                        $sql = "UPDATE `users` SET email='$email', username='$username', nama_lengkap='$nama_lengkap'
                                WHERE id='$id';";
                        if($mysqli -> query($sql)){
                            $_SESSION['email'] = $email;
                            $_SESSION['username'] = $username;
                            $_SESSION['nama_lengkap'] = $nama_lengkap;

                            echo "<script type='text/javascript'>document.location.href = 'v_alumni.php?page=profil&tab=akun';</script>";
                        }
                    }
                }
            ?>
            
            <?php    
                } else if ($tab == "data"){
                    $user = $_SESSION['id'];
                    $sql = " SELECT *  FROM alumni WHERE id_users='$user'";

                    $data = $mysqli -> query($sql) or die($mysqli->error);

                    $row = mysqli_fetch_array($data);
            ?>
                    <label for="jenis_kelamin" id="jenis_kelamin-label">
                    Jenis Kelamin</span>
                    <select id="jenis_kelamin" name="jenis_kelamin">
                        <option value="<?php echo $row['jenis_kelamin']?>"><?php echo $row['jenis_kelamin']?></option>
                        <option disabled>──────────</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    </label>
            
                    <label for="alamat" id="alamat-label">
                    Alamat</span>
                    <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat anda (Contoh: Jalan Kliningan No. 6)" value="<?php echo $row['alamat']?>"/>
                    </label>

                    <label for="tempat_lahir" id="tempat_lahir-label">
                    Tempat Lahir</span>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir anda (Contoh: Bandung)" value="<?php echo $row['tempat_lahir']?>"/>
                    </label>

                    <label for="tanggal_lahir" id="tanggal_lahir-label">
                    Tanggal Lahir</span>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan tanggal lahir anda" value="<?php echo $row['tanggal_lahir']?>"/>
                    </label>

                    <label for="no_telepon" id="no_telepon-label">
                    Nomor Telepon</span>
                    <input type="text" id="no_telepon" name="no_telepon" placeholder="Masukkan nomor telepon anda (Contoh: 08123456789)" value="<?php echo $row['no_telepon']?>"/>
                    </label>

                    <label for="jurusan" id="jurusan-label">
                    Jurusan</span>
                    <select id="jurusan" name="jurusan">
                        <option value="<?php echo $row['jurusan']?>"><?php echo $row['jurusan']?></option>
                        <option disabled>──────────</option>
                        <option value="Multimedia">Multimedia</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Teknik Komputer Jarindgan">Teknik Komputer Jaringan</option>
                        <option value="Teknik Audio Video">Teknik Audio Video</option>
                        <option value="Teknik Instalasi Tenaga Listrik">Teknik Instalasi Tenaga Listrik</option>
                        <option value="Teknik Otomasi Industri">Teknik Otomasi Industri</option>
                    </select>
                    </label>

                    <label for="tahun_masuk" id="tahun_masuk-label">
                    Tahun Masuk</span>
                    <input type="text" id="tahun_masuk" name="tahun_masuk" placeholder="Masukkan tahun masuk anda (Contoh: 2022)" value="<?php echo $row['tahun_masuk']?>"/>
                    </label>

                    <label for="tahun_lulus" id="tahun_lulus-label">
                    Tahun Lulus</span>
                    <input type="text" id="tahun_lulus" name="tahun_lulus" placeholder="Masukkan tahun lulus anda (Contoh: 2022)" value="<?php echo $row['tahun_lulus']?>"/>
                    </label>

                    <label for="no_ijazah" id="no_ijazah-label">
                    Nomor Ijazah</span>
                    <input type="text" id="no_ijazah" name="no_ijazah" placeholder="Masukkan nomor ijazah anda" value="<?php echo $row['no_ijazah']?>"/>
                    </label>

                    <label for="no_skhun" id="no_skhun-label">
                    Nomor SKHUN</span>
                    <input type="text" id="no_skhun" name="no_skhun" placeholder="Masukkan nomor skhun anda" value="<?php echo $row['no_skhun']?>"/>
                    </label>

                    <button class="btn btn-primary btn-update" type="submit" name="update" value="update">Update Data</button>

                    <?php
                    if(isset($_POST['update'])){
                        $jenis_kelamin = $_POST['jenis_kelamin'];
                        $alamat = $_POST['alamat'];
                        $tempat_lahir = $_POST['tempat_lahir'];
                        $tanggal_lahir = $_POST['tanggal_lahir'];
                        $no_telepon = $_POST['no_telepon'];
                        $jurusan = $_POST['jurusan'];
                        $tahun_masuk = $_POST['tahun_masuk'];
                        $tahun_lulus = $_POST['tahun_lulus'];
                        $no_ijazah = $_POST['no_ijazah'];
                        $no_skhun = $_POST['no_skhun'];

                        $id = $_SESSION['id'];
                        $sql = "UPDATE `alumni` SET jenis_kelamin='$jenis_kelamin', alamat='$alamat', tempat_lahir='$tempat_lahir',
                                tanggal_lahir='$tanggal_lahir', no_telepon='$no_telepon', jurusan='$jurusan', tahun_masuk='$tahun_masuk',
                                tahun_lulus='$tahun_lulus', no_ijazah='$no_ijazah', no_skhun='$no_skhun'
                                WHERE id_users='$id';";
                        if($mysqli -> query($sql)){
                            echo "<script type='text/javascript'>document.location.href = 'v_alumni.php?page=profil&tab=data';</script>";
                        }
                    }
                    ?>
            
            <?php
                } else if ($tab == "status"){
            ?>
                    <label for="email" id="email-label">
                            Email</span>
                            <input type="email" id="username" placeholder="Masukkan email anda" />
                            </label>
                    
                            <label for="username" id="username-label">
                            Username</span>
                            <input type="text" id="username" placeholder="Masukkan username anda" />
                            </label>
        
                            <label for="name" id="name-label">
                            Nama Lengkap</span>
                            <input type="text" id="name" placeholder="Masukkan nama lengkap"/>
                    </label>
                    
            <?php
                }
            ?>
            </form>
</body>

</html>