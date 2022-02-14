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

                $user = $_SESSION['id_user'];
                $sql = " SELECT *  FROM users WHERE id_user='$user'";

                $data = $mysqli -> query($sql) or die($mysqli->error);

                $row = mysqli_fetch_array($data);
                
            ?>
        <label for="email" id="email-label">
            Email</span>
            <input type="text" id="email" name="email" placeholder="Masukkan email anda"
                value="<?php echo $row['email']?>" />
        </label>

        <label for="username" id="username-label">
            Username</span>
            <input type="text" id="username" name="username" placeholder="Masukkan username anda"
                value="<?php echo $row['username']?>" />
        </label>


        <button class="btn btn-primary btn-update" type="submit" name="update" value="update">Update Data</button>

        <?php
                    if(isset($_POST['update'])){
                    $email = $_POST['email'];
                    $username = $_POST['username'];

                    if(empty($email) OR empty($username)){
                        echo "Field Tidak Boleh Kosong!";
                    } else {
                        $id_user = $_SESSION['id_user'];
                        $sql = "UPDATE `users` SET email='$email', username='$username',
                                WHERE id='$id_user';";
                        if($mysqli -> query($sql)){
                            $_SESSION['email'] = $email;
                            $_SESSION['username'] = $username;

                            echo "<script type='text/javascript'>document.location.href = 'v_alumni.php?page=profil&tab=akun';</script>";
                        }
                    }
                }
            ?>

        <?php    
        } else if ($tab == "data"){
            $user = $_SESSION['id_user'];
            $sql = " SELECT *  FROM alumni WHERE id_users='$user'";

            $data = $mysqli -> query($sql) or die($mysqli->error);

            $row = mysqli_fetch_array($data);
        ?>

        <label for="nama_lengkap" id="nama_lengkap-label">
            Nama Lengkap</span>
            <input type="text" id="nama_lengkap" name="nama_lengkap"
                placeholder="Masukkan nama lengkap anda (Contoh: Naufal Ramdhan Rizqika)"
                value="<?php echo $row['nama_lengkap']?>" />
        </label>

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
            <input type="text" id="alamat" name="alamat"
                placeholder="Masukkan alamat anda (Contoh: Jalan Kliningan No. 6)"
                value="<?php echo $row['alamat']?>" />
        </label>

        <label for="tempat_lahir" id="tempat_lahir-label">
            Tempat Lahir</span>
            <input type="text" id="tempat_lahir" name="tempat_lahir"
                placeholder="Masukkan tempat lahir anda (Contoh: Bandung)" value="<?php echo $row['tempat_lahir']?>" />
        </label>

        <label for="tanggal_lahir" id="tanggal_lahir-label">
            Tanggal Lahir</span>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan tanggal lahir anda"
                value="<?php echo $row['tanggal_lahir']?>" />
        </label>

        <label for="no_telepon" id="no_telepon-label">
            Nomor Telepon</span>
            <input type="text" id="no_telepon" name="no_telepon"
                placeholder="Masukkan nomor telepon anda (Contoh: 08123456789)"
                value="<?php echo $row['no_telepon']?>" />
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
            <input type="text" id="tahun_masuk" name="tahun_masuk"
                placeholder="Masukkan tahun masuk anda (Contoh: 2022)" value="<?php echo $row['tahun_masuk']?>" />
        </label>

        <label for="tahun_lulus" id="tahun_lulus-label">
            Tahun Lulus</span>
            <input type="text" id="tahun_lulus" name="tahun_lulus"
                placeholder="Masukkan tahun lulus anda (Contoh: 2022)" value="<?php echo $row['tahun_lulus']?>" />
        </label>

        <label for="no_ijazah" id="no_ijazah-label">
            Nomor Ijazah</span>
            <input type="text" id="no_ijazah" name="no_ijazah" placeholder="Masukkan nomor ijazah anda"
                value="<?php echo $row['no_ijazah']?>" />
        </label>

        <label for="no_skhun" id="no_skhun-label">
            Nomor SKHUN</span>
            <input type="text" id="no_skhun" name="no_skhun" placeholder="Masukkan nomor skhun anda"
                value="<?php echo $row['no_skhun']?>" />
        </label>

        <button class="btn btn-primary btn-update" type="submit" name="update" value="update">Update Data</button>

        <?php
            if(isset($_POST['update'])){
                $nama_lengkap = $_POST['nama_lengkap'];
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

                $id_user = $_SESSION['id_user'];
                $sql = "UPDATE `alumni` SET nama_lengkap = '$nama_lengkap', jenis_kelamin='$jenis_kelamin', alamat='$alamat', tempat_lahir='$tempat_lahir',
                        tanggal_lahir='$tanggal_lahir', no_telepon='$no_telepon', jurusan='$jurusan', tahun_masuk='$tahun_masuk',
                        tahun_lulus='$tahun_lulus', no_ijazah='$no_ijazah', no_skhun='$no_skhun'
                        WHERE id_users='$id_user';";
                if($mysqli -> query($sql)){
                    echo "<script type='text/javascript'>document.location.href = 'v_alumni.php?page=profil&tab=data';</script>";
                }
            }
        ?>

        <?php

        } else if ($tab == "status"){
            $user = $_SESSION['id_user'];
            $sql = " SELECT id_alumni, status FROM alumni WHERE id_users='$user'";

            $data = $mysqli -> query($sql) or die($mysqli->error);

            $row = mysqli_fetch_array($data);
            $id_alumni = $row['id_alumni'];

            if($mysqli -> query($sql)){
                    $sql1 = " INSERT INTO `deskripsi_pekerjaan` (id_alumni, nama_perusahaan, alamat_perusahaan, posisi) VALUES
                                ('$id_alumni' null, null, null)";
                    $sql2 = "INSERT INTO `deskripsi_kuliah` (id_alumni, nama_perguruan_tinggi, alamat_perguruan_tinggi, fakultas, jurusan, semester)
                                VALUES ('$id_alumni' null, null, null, null, null)";
                    $sql3= "INSERT INTO `deskripsi_wirausaha` (id_alumni, nama_usaha, alamat_usaha, jenis_produk) VALUES
                                ('$id_alumni' null, null, null)";;

                    if ($mysqli -> query($sql1) && $mysqli -> query($sql2) && $mysqli -> query($sql3)) {
                        echo "success";
                    }
                
            }
        ?>


        <label for="status" id="status-label">
            Status</span>
            <select id="status" name="status">
                <option value="<?php echo $row['status']?>"><?php echo $row['status']?></option>
                <option disabled>──────────</option>
                <option value="Bekerja">Bekerja</option>
                <option value="Kuliah">Kuliah</option>
                <option value="Wirausaha">Wirausaha</option>
                <option value="Tidak Bekerja Ataupun Kuliah">Tidak Bekerja Ataupun Kuliah</option>
            </select>
        </label>

        <button class="btn btn-primary btn-update" type="submit" name="update" value="update">Update Status</button>

        <?php
            if(isset($_POST['update'])){
                $status = $_POST['status'];

                $id_user = $_SESSION['id_user'];
                $id_alumni = $row['id_alumni'];
                $sql = " UPDATE `alumni` SET status = '$status' WHERE id_users = '$id_user';";
                if($mysqli -> query($sql)){

                    if($row['status'] == "Tidak Bekerja Ataupun Kuliah"){
                        $sql1 = " UPDATE `deskripsi_pekerjaan` SET nama_perusahaan = NULL, alamat_perusahaan = NULL,
                            posisi = NULL WHERE id_alumni = '$id_alumni';";
                        $sql2 = "UPDATE `deskripsi_kuliah` SET nama_perguruan_tinggi = NULL, alamat_perguruan_tinggi = NULL,
                                    fakultas = NULL, jurusan = NULL, semester = NULL WHERE id_alumni = '$id_alumni';";
                        $sql3= "UPDATE `deskripsi_wirausaha` SET nama_usaha = NULL, alamat_usaha = NULL, jenis_produk = NULL
                                WHERE id_alumni = '$id_alumni';";

                        if($mysqli -> query($sql1) && $mysqli -> query($sql2) && $mysqli -> query($sql3)){
                            echo "<script type='text/javascript'>document.location.href = 'v_alumni.php?page=profil&tab=status';</script>";
                        }
                    }
                }
            }
        ?>

        <?php
            if($row['status'] == "Bekerja"){
                $user = $_SESSION['id_user'];
                $id_alumni = $row['id_alumni'];
                $sql = " SELECT * FROM deskripsi_pekerjaan WHERE id_alumni = '$id_alumni';";

                $data = $mysqli -> query($sql) or die($mysqli->error);

                $row = mysqli_fetch_array($data);

        ?>
            <label for="nama_perusahaan" id="nama_perusahaan-label">
                Nama Perusahaan</span>
                <input type="text" id="nama_perusahaan" name="nama_perusahaan"
                    placeholder="Masukkan nama perusahaan anda (Contoh: PT. CASADEV)"
                    value="<?php echo $row['nama_perusahaan']?>" />
            </label>


            <label for="alamat_perusahaan" id="alamat_perusahaan-label">
                Alamat Perusahaan</span>
                <input type="text" id="alamat_perusahaan" name="alamat_perusahaan"
                    placeholder="Masukkan alamat perusahaan anda (Contoh: Jalan Kliningan No. 6)"
                    value="<?php echo $row['alamat_perusahaan']?>" />
            </label>

            <label for="posisi" id="posisi-label">
                Posisi</span>
                <input type="text" id="posisi" name="posisi"
                    placeholder="Masukkan posisi anda di perusahaan (Contoh: Web Developer)"
                    value="<?php echo $row['posisi']?>" />
            </label>

            <button class="btn btn-primary btn-update" type="submit" name="update" value="update">Update Deskripsi Pekerjaan</button>

            <?php
            if(isset($_POST['update'])){
                $nama_perusahaan = $_POST['nama_perusahaan'];
                $alamat_perusahaan = $_POST['alamat_perusahaan'];
                $posisi = $_POST['posisi'];

                $id_user = $_SESSION['id_user'];
                $sql = " UPDATE `deskripsi_pekerjaan` SET nama_perusahaan = '$nama_perusahaan', alamat_perusahaan = '$alamat_perusahaan',
                        posisi = '$posisi' WHERE id_alumni = '$id_alumni';";
                if($mysqli -> query($sql)){

                    $sql1 = "UPDATE `deskripsi_kuliah` SET nama_perguruan_tinggi = NULL, alamat_perguruan_tinggi = NULL,
                            fakultas = NULL, jurusan = NULL, semester = NULL WHERE id_alumni = '$id_alumni';";
                    $sql2 = "UPDATE `deskripsi_wirausaha` SET nama_usaha = NULL, alamat_usaha = NULL, jenis_produk = NULL
                            WHERE id_alumni = '$id_alumni';";

                    if($mysqli -> query($sql1) && $mysqli -> query($sql2)){
                    echo "<script type='text/javascript'>document.location.href = 'v_alumni.php?page=profil&tab=status';</script>";
                    }
                }
            }
        ?>

        <?php
            } else if ($row['status'] == "Kuliah"){
                $user = $_SESSION['id_user'];
                $id_alumni = $row['id_alumni'];
                $sql = " SELECT * FROM deskripsi_kuliah WHERE id_alumni = '$id_alumni';";

                $data = $mysqli -> query($sql) or die($mysqli->error);

                $row = mysqli_fetch_array($data);
        ?>

                <label for="nama_perguruan_tinggi" id="nama_perguruan_tinggi-label">
                    Nama Perguruan Tinggi</span>
                    <input type="text" id="nama_perguruan_tinggi" name="nama_perguruan_tinggi"
                        placeholder="Masukkan nama perguruan tinggi anda (Contoh: Institut Teknologi Bandung)"
                        value="<?php echo $row['nama_perguruan_tinggi']?>" />
                </label>


                <label for="alamat_perguruan_tinggi" id="alamat_perguruan_tinggi-label">
                    Alamat Perguruan Tinggi</span>
                    <input type="text" id="alamat_perguruan_tinggi" name="alamat_perguruan_tinggi"
                        placeholder="Masukkan alamat perguruan tinggi anda (Contoh: Jalan Kliningan No. 6)"
                        value="<?php echo $row['alamat_perguruan_tinggi']?>" />
                </label>

                <label for="fakultas" id="fakultas-label">
                    Fakultas</span>
                    <input type="text" id="fakultas" name="fakultas"
                        placeholder="Masukkan fakultas anda (Contoh: Fakultas Kedokteran)"
                        value="<?php echo $row['fakultas']?>" />
                </label>

                <label for="jurusan" id="jurusan-label">
                    Jurusan</span>
                    <input type="text" id="jurusan" name="jurusan"
                        placeholder="Masukkan jurusan anda (Contoh: Jurusan Teknik Informatika)"
                        value="<?php echo $row['jurusan']?>" />
                </label>                

                <label for="semester" id="semester-label">
                    Semester</span>
                    <input type="text" id="semester" name="semester"
                        placeholder="Masukkan semester anda (Contoh: Semester 3)"
                        value="<?php echo $row['semester']?>" />
                </label>

                <button class="btn btn-primary btn-update" type="submit" name="update" value="update">Update Deskripsi Perguruan Tinggi</button>

                <?php
                if(isset($_POST['update'])){
                    $nama_perguruan_tinggi = $_POST['nama_perguruan_tinggi'];
                    $alamat_perguruan_tinggi = $_POST['alamat_perguruan_tinggi'];
                    $fakultas = $_POST['fakultas'];
                    $jurusan = $_POST['jurusan'];
                    $semester = $_POST['semester'];

                    $id_user = $_SESSION['id_user'];
                    $sql = "UPDATE `deskripsi_kuliah` SET nama_perguruan_tinggi = '$nama_perguruan_tinggi', alamat_perguruan_tinggi = '$alamat_perguruan_tinggi',
                            fakultas = '$fakultas', jurusan = '$jurusan', semester = '$semester' WHERE id_alumni = '$id_alumni';";
                    if($mysqli -> query($sql)){
                        $sql1 = " UPDATE `deskripsi_pekerjaan` SET nama_perusahaan = NULL, alamat_perusahaan = NULL,
                                posisi = NULL WHERE id_alumni = '$id_alumni';";
                        $sql2 = "UPDATE `deskripsi_wirausaha` SET nama_usaha = NULL, alamat_usaha = NULL, jenis_produk = NULL
                                WHERE id_alumni = '$id_alumni';";

                        if($mysqli -> query($sql1) && $mysqli -> query($sql2)){
                        echo "<script type='text/javascript'>document.location.href = 'v_alumni.php?page=profil&tab=status';</script>";
                        }
                    }
                }
                ?>

        <?php
            } else if ($row['status'] == "Wirausaha"){
                $user = $_SESSION['id_user'];
                $id_alumni = $row['id_alumni'];
                $sql = " SELECT * FROM deskripsi_wirausaha WHERE id_alumni = '$id_alumni';";

                $data = $mysqli -> query($sql) or die($mysqli->error);

                $row = mysqli_fetch_array($data);
        ?>

                <label for="nama_usaha" id="nama_usaha-label">
                    Nama Usaha</span>
                    <input type="text" id="nama_usaha" name="nama_usaha"
                        placeholder="Masukkan nama usaha anda (Contoh: CASA COOKIES)"
                        value="<?php echo $row['nama_usaha']?>" />
                </label>


                <label for="alamat_usaha" id="alamat_usaha-label">
                    Alamat Tempat Usaha</span>
                    <input type="text" id="alamat_usaha" name="alamat_usaha"
                        placeholder="Masukkan alamat usaha anda (Contoh: Jalan Kliningan No. 6)"
                        value="<?php echo $row['alamat_usaha']?>" />
                </label>

                <label for="jenis_produk" id="jenis_produk-label">
                    Jenis Produk Usaha Anda</span>
                    <input type="text" id="jenis_produk" name="jenis_produk"
                        placeholder="Masukkan jenis produk anda (Contoh: Food and Beverage)"
                        value="<?php echo $row['jenis_produk']?>" />
                </label>  
            
                <button class="btn btn-primary btn-update" type="submit" name="update" value="update">Update Deskripsi Usaha</button>

                <?php
                if(isset($_POST['update'])){
                    $nama_usaha = $_POST['nama_usaha'];
                    $alamat_usaha = $_POST['alamat_usaha'];
                    $jenis_produk = $_POST['jenis_produk'];

                    $id_user = $_SESSION['id_user'];
                    $sql = "UPDATE `deskripsi_wirausaha` SET nama_usaha = '$nama_usaha', alamat_usaha = '$alamat_usaha', jenis_produk = '$jenis_produk'
                                WHERE id_alumni = '$id_alumni';";

                    if($mysqli -> query($sql)){

                        $sql1 = " UPDATE `deskripsi_pekerjaan` SET nama_perusahaan = NULL, alamat_perusahaan = NULL,
                                posisi = NULL WHERE id_alumni = '$id_alumni';";
                        $sql2 = "UPDATE `deskripsi_kuliah` SET nama_perguruan_tinggi = NULL, alamat_perguruan_tinggi = NULL,
                                fakultas = NULL, jurusan = NULL, semester = NULL WHERE id_alumni = '$id_alumni';";
                        
                        if($mysqli -> query($sql1) && $mysqli -> query($sql2)){
                        echo "<script type='text/javascript'>document.location.href = 'v_alumni.php?page=profil&tab=status';</script>";
                        }
                    }
                }
                ?>

        <?php
            }
        ?>

        <?php
                }
        ?>
    </form>
</body>

</html>