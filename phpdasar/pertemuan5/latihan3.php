<?php 
$mahasiswa = [["adiya tanaya permana","213040088","adiyazam03@gmail.com"],["lubnatul hilwah","213040066","lubna03@gmail.com"]];

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Daftar mahasiswa</title>
 </head>
 <body>
 	<h1>daftar mahasiswa</h1>

 	<!-- looping -->
 	<ul>
 		<?php foreach ($mahasiswa as $mhs) : ?>
 			<li>nama: <?= $mhs[0]; ?></li>
 			<li>nrp: <?= $mhs[1]; ?></li>
 			<li>email: <?= $mhs[2]; ?></li>
 			<br>
 		<?php endforeach; ?>
 	</ul>
 </body>
 </html>