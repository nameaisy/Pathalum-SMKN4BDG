<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/tabel.css">

    <title>Pathalum</title>
</head>

<body>
	

	<br/>
	<table class="table table-bordered">
		<tr>
			<th>NO</th>
			<th>Nama</th>
			<th>Jurusan</th>
			<th>Tahun Masuk</th>
			<th>Tahun Lulus</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
		<?php
        include '../lib/library.php';
        $no = 1;
        $data = mysqli_query($mysqli, "select * from alumni");
        while ($d = mysqli_fetch_array($data)) {
            ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama_lengkap'] == null ? "Belum Melengkapi Data" : $d['nama_lengkap']; ?></td>
				<td><?php echo $d['jurusan'] == null ? "Belum Melengkapi Data" : $d['jurusan']; ?></td>
				<td><?php echo $d['tahun_masuk'] == null ? "Belum Melengkapi Data" : $d['tahun_masuk']; ?></td>
				<td><?php echo $d['tahun_lulus'] == null ? "Belum Melengkapi Data" : $d['tahun_lulus'];?></td>
				<td><?php echo $d['status'] == null ? "Belum Melengkapi Data" : $d['status']; ?></td>
                <td>
                    <a href="delete.php?id_alumni=<?php echo $d['id_alumni']; ?>">
						<button class="btn btn-primary btn-masuk" type="submit" name="masuk" value="masuk">
							<img src="https://img.icons8.com/material-rounded/24/ffffff/trash.png"/>
                    	</button>
                    </a>
                    <a href="v_detail_alumni.php?id_alumni=<?php echo $d['id_alumni']; ?>">
                    	<button class="btn btn-primary btn-masuk" type="submit" name="masuk" value="masuk">
							<img src="https://img.icons8.com/material-rounded/24/ffffff/view-details.png"/>
						</button>
                    </a>
				</td>
			</tr>
			<?php
        }
        ?>
	</table>
</body>
</html>