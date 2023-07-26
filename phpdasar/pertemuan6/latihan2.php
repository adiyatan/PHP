<?php 
// $mahasiswa = [["adiya",213040088,"adiyazam03@gmail.com","teknik informatika"],["lubna",123123,"lubna03@gmail.com","akutansi"]];

//array assosiative
$mahasiswa = [
			["nama" => "adiya",
			"nrp" => "213040088",
			"email" => "adiyazam03@gmail.com",
			"jurusan" => "TI",
			"gambar" => "1.jpg"],

			["nama" => "lubna",
			"nrp" => "123123",
			"email" => "lubna03@gmail.com",
			"jurusan" => "akutansi",
			"gambar" => "2.jpg"]];

// echo $mahasiswa[1]["nrp"];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>daftar mahasiswa</title>
 </head>
 <body>
 	<h1>daftar mahasiswa</h1>

 	<?php foreach($mahasiswa as $mhs): ?>
 	<ul>
 		<li>
 			<img src="img/<?= $mhs["gambar"] ?>">
 		</li>
 		<li>nama: <?= $mhs["nama"]?></li>
 		<li>nrp: <?= $mhs["nrp"]?></li>
 		<li>email: <?= $mhs["email"]?></li>
 		<li>jurusan: <?= $mhs["jurusan"]?></li>
 	</ul>
 <?php endforeach; ?>
 </body>
 </html>