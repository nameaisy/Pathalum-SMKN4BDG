<?php
include "../lib/library.php";

$sql = "SELECT SUM(jurusan = 'Multimedia') as MM, 
	SUM(jurusan = 'Rekayasa Perangkat Lunak') as RPL,
	SUM(jurusan = 'Teknik Komputer Jaringan') as TKJ,
	SUM(jurusan = 'Teknik Audio Video') as TAV,
	SUM(jurusan = 'Teknik Instalasi Tenaga Listrik') as TITL,
	SUM(jurusan = 'Teknik Otomasi Industri') as TOI
FROM alumni;";
$data = $mysqli->query($sql) or die($mysqli->error);
$jurusan = mysqli_fetch_array($data);

$sql1 = "SELECT SUM(status = 'Bekerja') as kerja, 
	SUM(status = 'Kuliah') as kuliah,
	SUM(status = 'Wirausaha') as usaha,
	SUM(status = 'Tidak Bekerja Ataupun Kuliah') as none
FROM alumni;";
$data1 = $mysqli->query($sql1) or die($mysqli->error);
$lulusan = mysqli_fetch_array($data1);

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
	<link rel="stylesheet" href="../styles/chart.css">

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<title>Pathalum</title>
</head>

<body>

	<div class="welcome">
		<img src="../assets/home_admin.jpg" alt="" class="welcome-img">
	</div>

	<div class="box">
		<div class="box-form">
			<div class="kotakmm">
				<img src="https://img.icons8.com/material-rounded/64/ffffff/frame-rate.png"/>
				<h4><?php echo $jurusan['MM'];?></h4>
				<h5>MULTIMEDIA</h5>
			</div>
			<div class="kotakrpl">
				<img src="https://img.icons8.com/material-rounded/64/ffffff/code.png"/>
				<h4><?php echo $jurusan['RPL'];?></h4>
				<h5>REKAYASA PERANGKAT LUNAK</h5>
			</div>
			<div class="kotaktkj">
				<img src="https://img.icons8.com/material-rounded/64/ffffff/networking-manager.png"/>
				<h4><?php echo $jurusan['TKJ'];?></h4>
				<h5>TEKNIK KOMPUTER JARINGAN</h5>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="box-form">
			<canvas id="jurusan" width="500"></canvas>
		</div>
		<div class="container"></div>
		<div class="box-form">
			<canvas id="lulusan" width="500"></canvas>
		</div>
	</div>

	
</body>

</html>

<script>
		const ctx = document.getElementById('jurusan');
		const jurusan = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ['Multimedia', 'Rekayasa Perangkat Lunak', 'Teknik Komputer dan Jaringan', 'Teknik Audio Video', 'Teknik Instalasi Tenaga Listrik', 'Teknik Otomasi Industri'],
				datasets: [{
					label: 'Jumlah ',
					data: [<?php echo $jurusan['MM']; ?>, <?php echo $jurusan['RPL']; ?>, <?php echo $jurusan['TKJ']; ?>, <?php echo $jurusan['TAV']; ?>, <?php echo $jurusan['TITL']; ?>, <?php echo $jurusan['TOI']; ?>],
					backgroundColor: [
						'#5F27CD',
						'#1DD1A1',
						'#EE5253',
						'#FECA57',
						'#54A0FF',
						'#94A3B3'
					],
				}],
			},
			options: {
				responsive: true,
				color: '#222831',
				borderWidth: 0,
				plugins: {
					legend: {
						position: 'bottom',
						align: 'center',
						labels: {

						}
					},
					title: {
						display: true,
						text: 'Grafik Jumlah Alumni Berdasarkan Jurusan',
						color: '#222831',
						font: {
							size: 20,
						},
						margin:{
							bottom: 10,
						}
					},
				},
			}
		});
	</script>

<script>
		const ctx1 = document.getElementById('lulusan');
		const lulusan = new Chart(ctx1, {
			type: 'doughnut',
			data: {
				labels: ['Bekerja', 'Kuliah', 'Wirausaha', 'Tidak Bekerja Ataupun Kuliah'],
				datasets: [{
					label: 'Jumlah ',
					data: [<?php echo $lulusan['kerja']; ?>, <?php echo $lulusan['kuliah']; ?>, <?php echo $lulusan['usaha']; ?>, <?php echo $lulusan['none']; ?>],
					backgroundColor: [
						'#263238',
						'#726170',
						'#AA94A7',
						'#C4C4C4',
					],
				}],
			},
			options: {
				responsive: true,
				color: '#222831',
				borderWidth: 0,
				plugins: {
					legend: {
						position: 'bottom',
						align: 'center',
						labels: {

						}
					},
					title: {
						display: true,
						text: 'Grafik Jumlah Alumni Berdasarkan Lulusan',
						color: '#222831',
						font: {
							size: 20,
						},
						margin:{
							bottom: 10,
						}
					},
				},
			}
		});
	</script>
