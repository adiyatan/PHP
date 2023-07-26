<?php 
$mobil = [
			["tipe" => "911",
			"jenis" => "race",
			"warna" => "merah",
			"topspeed" => "300km.h",
			"gambar" => "1.png"],

			["tipe" => "coupe",
			"jenis" => "fan",
			"warna" => "abu",
			"topspeed" => "283",
			"gambar" => "2.png"],

			["tipe" => "642",
			"jenis" => "roadster",
			"warna" => "pink",
			"topspeed" => "293",
			"gambar" => "3.png"],

			["tipe" => "sherby",
			"jenis" => "mini race",
			"warna" => "abu",
			"topspeed" => "113",
			"gambar" => "4.png"],

			["tipe" => "GT 911",
			"jenis" => "super race",
			"warna" => "white",
			"topspeed" => "428",
			"gambar" => "5.png"],];

// echo $mobil[1]["jenis"];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>daftar mobil</title>
 </head>
 <body>
 	<h1>daftar mobil</h1>

 	<?php foreach($mobil as $mbl): ?>
 	<ul>
 		<li>
 			<img src="img/<?= $mbl["gambar"] ?>">
 		</li>
 		<li>tipe: <?= $mbl["tipe"]?></li>
 		<li>jenis: <?= $mbl["jenis"]?></li>
 		<li>warna: <?= $mbl["warna"]?></li>
 		<li>topspeed: <?= $mbl["topspeed"]?></li>
 	</ul>
 <?php endforeach; ?>
 </body>
 </html>