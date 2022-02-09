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
			<th>Opsi</th>
		</tr>
		<?php 
		include '../lib/library.php';
		$no = 1;
		$data = mysqli_query($mysqli,"select * from alumni,users where level = 'alumni'");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama_lengkap']; ?></td>
				<td><?php echo $d['jurusan']; ?></td>
				<td><?php echo $d['tahun_masuk']; ?></td>
				<td><?php echo $d['tahun_lulus']; ?></td>
                <td>
					<a href="edit.php?id=<?php echo $d['id_user']; ?>">
                    <button class="btn btn-primary btn-masuk" type="submit" name="masuk" value="masuk">
                    <img src="https://img.icons8.com/material-rounded/24/000000/edit--v1.png"/>
                    </button>
                    </a>
                    <a href="edit.php?id=<?php echo $d['id_user']; ?>">
                    <button class="btn btn-primary btn-masuk" type="submit" name="masuk" value="masuk">
                    <img src="https://img.icons8.com/material-rounded/24/000000/trash.png"/>
                    </button>
                    </a>
                    <a href="v_detail_alumni.php?id=<?php echo $d['id_user']; ?>">
                    <button class="btn btn-primary btn-masuk" type="submit" name="masuk" value="masuk">
                    <img src="https://img.icons8.com/material-rounded/24/000000/view-details.png"/>
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