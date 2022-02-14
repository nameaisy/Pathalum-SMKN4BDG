<?php
include '../lib/library.php';

if (isset($_GET['id_alumni'])) {
    $id_alumni = $_GET['id_alumni'];
    $sql = "SELECT * FROM alumni WHERE id_alumni = " . $id_alumni;
    $sql1 = "SELECT alumni.id_users, users.email, users.username FROM alumni, users WHERE alumni.id_users = users.id_user AND users.level = 'alumni' ";
    $result = $mysqli->query($sql);
    $result1 = $mysqli -> query($sql1) or die($mysqli->error);
    if ($result->num_rows > 0) {
        $data_alumni = $result->fetch_array();
        $data_user = $result1->fetch_array();
    } else {
        exit("ID Tidak ditemukan.");
    }
}

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
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/detail.css">

    <title>Pathalum</title>
</head>

<body>
    <div class="header">
        <ul class="nav">
            <li class="nav-item navbar-brand">
                <img src="../assets/logo/SMKN4.svg" alt="" width="60" height="60" class="smkn4" colo\\>
                SMK NEGERI 4 BANDUNG
            </li>
        </ul>

    </div>

    <div class="main-container box-form">
        <h3>Detail Akun</h3>
        <table>
            <tr>
                <th>email</th>
                <th>:</th>
                <td><?php echo $data_user['email']; ?></td>
            </tr>
            <tr>
                <th>username</th>
                <th>:</th>
                <td><?php echo $data_user['username']; ?></td>
            </tr>
        </table>
    </div>

    <div class="main-container box-form">
        <h3>Data Diri Alumni</h3>
        <table>
            <tr>
                <th>Nama</th>
                <th>:</th>
                <td><?php echo $data_alumni['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <th>:</th>
                <td><?php echo $data_alumni['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <th>:</th>
                <td><?php echo $data_alumni['alamat']; ?></td>
            </tr>
            <tr>
                <th>Tempat Tanggal Lahir</th>
                <th>:</th>
                <td><?php echo $data_alumni['tempat_lahir']; ?>, <?= $data_alumni['tanggal_lahir'] ?></td>
            </tr>
            <tr>
                <th>No. Telepon</th>
                <th>:</th>
                <td><?php echo $data_alumni['no_telepon']; ?></td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <th>:</th>
                <td><?php echo $data_alumni['jurusan']; ?></td>
            </tr>
            <tr>
                <th>Tahun Masuk</th>
                <th>:</th>
                <td><?php echo $data_alumni['tahun_masuk']; ?></td>
            </tr>
            <tr>
                <th>Tahun Lulus</th>
                <th>:</th>
                <td><?php echo $data_alumni['tahun_lulus']; ?></td>
            </tr>
        </table>
    </div>

    <div class="main-container box-form">
        <h3>Status</h3>
        <table>
            <tr>
                <th>Status</th>
                <th>:</th>
                <td><?php echo $data_alumni['status']; ?></td>
            </tr>
            <?php
            if ($data_alumni['status'] == 'Bekerja') {
                $sql = "SELECT * FROM deskripsi_pekerjaan WHERE id_alumni = '$id_alumni';";

                $data = $mysqli->query($sql) or die($mysqli);

                $row = mysqli_fetch_array($data);

            ?>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>:</th>
                    <td><?php echo $row['nama_perusahaan']; ?></td>
                </tr>
                <tr>
                    <th>Alamat Perusahaan</th>
                    <th>:</th>
                    <td><?php echo $row['alamat_perusahaan']; ?></td>
                </tr>
                <tr>
                    <th>Posisi</th>
                    <th>:</th>
                    <td><?php echo $row['posisi']; ?></td>
                </tr>

            <?php
            }
            if ($data_alumni['status'] == 'Kuliah') {
                $sql = "SELECT * FROM deskripsi_kuliah WHERE id_alumni = '$id_alumni';";

                $data = $mysqli->query($sql) or die($mysqli);

                $row = mysqli_fetch_array($data);
            ?>
                <tr>
                    <th>Nama Perguruan Tinggi</th>
                    <th>:</th>
                    <td><?php echo $row['nama_perguruan_tinggi']; ?></td>
                </tr>
                <tr>
                    <th>Alamat Perguruan Tinggi</th>
                    <th>:</th>
                    <td><?php echo $row['alamat_perguruan_tinggi']; ?></td>
                </tr>
                <tr>
                    <th>Fakultas</th>
                    <th>:</th>
                    <td><?php echo $row['fakultas']; ?></td>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <th>:</th>
                    <td><?php echo $row['jurusan']; ?></td>
                </tr>
                <tr>
                    <th>Semester</th>
                    <th>:</th>
                    <td><?php echo $row['semester']; ?></td>
                </tr>

            <?php
            }
            if ($data_alumni['status'] == 'Wirausaha') {
                $sql = "SELECT * FROM deskripsi_wirausaha WHERE id_alumni = '$id_alumni';";

                $data = $mysqli->query($sql) or die($mysqli);

                $row = mysqli_fetch_array($data);
            
            ?>
            <tr>
                <th>Nama Usaha</th>
                <th>:</th>
                <td><?php echo $row['nama_usaha']; ?></td>
            </tr>
            <tr>
                <th>Alamat Usaha</th>
                <th>:</th>
                <td><?php echo $row['alamat_usaha']; ?></td>
            </tr>
            <tr>
                <th>Jenis Produk</th>
                <th>:</th>
                <td><?php echo $row['jenis_produk']; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
            
</html>