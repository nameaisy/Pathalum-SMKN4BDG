<?php
    include '../lib/library.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $password = $_POST['password'];
        $konfirm_password = $_POST['konfirm_password'];

        if ($password == $konfirm_password) {
            if (cek_email($mysqli, $email) == 0) {
                $sql = " INSERT INTO users (email, username, nama_lengkap, password, level) values ('$email', '$username', '$nama_lengkap', SHA1('$password'), 'alumni')";

                $data = $mysqli -> query($sql) or die($mysqli->error);
                if ($data) {
                    $sql1 = "SELECT * FROM users WHERE email='$email';";
                    $datasql1 = $mysqli -> query($sql1) or die($mysqli->error);
                    $row = mysqli_fetch_array($datasql1);
                    $id_user = $row['id_user'];
                    $sql2 = "INSERT INTO alumni (id_users, jenis_kelamin, alamat, tempat_lahir, no_telepon, jurusan, tahun_masuk, tahun_lulus, no_ijazah, no_skhun, status) values ('$id_user', NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL, NULL);";
                    $datasql2 = $mysqli -> query($sql2) or die($mysqli->error);

                    $sql3 = "INSERT INTO deskripsi_pekerjaan (id_users, nama_perusahaan, alamat_perusahaan, posisi) values ('$id_user', NULL, NULL, NULL);";
                    $sql4 = "INSERT INTO deskripsi_kuliah (id_users, nama_perguruan_tinggi, alamat_perguruan_tinggi, fakultas, jurusan, semester) values ('$id_user', NULL, NULL, NULL, NULL, NULL);";
                    $sql5 = "INSERT INTO deskripsi_wirausaha (id_users, nama_usaha, alamat_usaha, jenis_produk) values ('$id_user', NULL, NULL, NULL);";

                    $datasql3 = $mysqli -> query($sql3) or die($mysqli->error);
                    $datasql4 = $mysqli -> query($sql4) or die($mysqli->error);
                    $datasql5 = $mysqli -> query($sql5) or die($mysqli->error);
                    header('location: login.php');
                } else {
                    echo "Error";
                }
            } elseif (cek_email($mysqli, $email) != 0) {
                echo "email sudah terdaftar";
            }
        } elseif ($password != $konfirm_password) {
            echo "Password tidak sama";
        }
    }

    function cek_email($mysqli, $emails){
        $email = $_POST['email'];
        $sql = "SELECT * FROM users WHERE email = '$email';";

        if($data = $mysqli -> query($sql) or die($mysqli)){
            return $data->num_rows;
        }
    }
        

    include 'v_register.php';
?>