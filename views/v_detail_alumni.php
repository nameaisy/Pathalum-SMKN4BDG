<?php
include '../lib/library.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users,alumni WHERE users.id = " . $id;
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $d = $result->fetch_array();
    } else {
        exit("ID Tidak ditemukan.");
    }
} else {
    exit("ID Tidak ditemukan");
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
                <td><?php echo $d['email']; ?></td>
            </tr>
            <tr>
                <th>username</th>
                <th>:</th>
                <td><?php echo $d['username']; ?></td>
            </tr>
        </table>
    </div>

    <div class="main-container box-form">
        <h3>Data DIri Alumni</h3>
        <table>
            <tr>
                <th>Nama</th>
                <th>:</th>
                <td><?php echo $d['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <th>:</th>
                <td><?php echo $d['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <th>:</th>
                <td><?php echo $d['alamat']; ?></td>
            </tr>
            <tr>
                <th>Tempat Tanggal Lahir</th>
                <th>:</th>
                <td><?php echo $d['tempat_lahir']; ?>, <?= $d['tanggal_lahir'] ?></td>
            </tr>
            <tr>
                <th>No. Telepon</th>
                <th>:</th>
                <td><?php echo $d['no_telepon']; ?></td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <th>:</th>
                <td><?php echo $d['jurusan']; ?></td>
            </tr>
            <tr>
                <th>Tahun Masuk</th>
                <th>:</th>
                <td><?php echo $d['tahun_masuk']; ?></td>
            </tr>
            <tr>
                <th>Tahun Lulus</th>
                <th>:</th>
                <td><?php echo $d['tahun_lulus']; ?></td>
            </tr>
        </table>
    </div>

    <div class="main-container box-form">
        <h3>Status</h3>
        <table>
            <tr>
                <th>Status</th>
                <th>:</th>
                <td><?php echo $d['status']; ?></td>
            </tr>
            <?php
            if ($d['status'] == 'Bekerja') {
                $sql = "SELECT * FROM deskripsi_pekerjaan WHERE id_users = '$id';";

                $data = $mysqli-> query($sql) or die($mysqli);

                $row = mysqli_fetch_array($data);
            
            ?>
            <tr>
                <th>Nama Perusahaan</th>
                <th>:</th>
                <td><?php echo $row['nama_perusahaan']; ?></td>
            </tr>

            <?php
            } 
            ?>
        </table>
    </div>
</body>

</html>