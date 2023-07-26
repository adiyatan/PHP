<?php 
//cek apakah ada data $_get
if (!isset($_GET["tipe"]) || !isset($_GET["jenis"]) || !isset($_GET["warna"]) || !isset($_GET["topspeed"]) || !isset($_GET["gambar"])) {
	//redirect
	header("Location: latihan1.php");
	exit;
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>detail mobil</title>
</head>
<body>
	<h1>detail mobil</h1>
 	<ul>
 		<li>
 			<img src="img/<?= $_GET["gambar"] ?>">
 		</li>
 		<li>tipe: <?= $_GET["tipe"]?></li>
 		<li>jenis: <?= $_GET["jenis"]?></li>
 		<li>warna: <?= $_GET["warna"]?></li>
 		<li>topspeed: <?= $_GET["topspeed"]?></li>
 	</ul>

 <a href="latihan1.php">kembali</a>
</body>
</html>