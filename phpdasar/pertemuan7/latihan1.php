i<?php 
$mobil = [
			["tipe" => "911",
			"jenis" => "race",
			"warna" => "merah",
			"topspeed" => "300km/h",
			"gambar" => "1.png"],

			["tipe" => "coupe",
			"jenis" => "fan",
			"warna" => "abu",
			"topspeed" => "283km/h",
			"gambar" => "2.png"],

			["tipe" => "642",
			"jenis" => "roadster",
			"warna" => "pink",
			"topspeed" => "293km/h",
			"gambar" => "3.png"],

			["tipe" => "sherby",
			"jenis" => "mini race",
			"warna" => "abu",
			"topspeed" => "113km/h",
			"gambar" => "4.png"],

			["tipe" => "GT 911",
			"jenis" => "super race",
			"warna" => "white",
			"topspeed" => "428km/h",
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

 	<ul>
 	<?php foreach($mobil as $mbl): ?>
 		<li>
 			<a href="latihan2.php?tipe=<?= $mbl["tipe"] ?>&jenis=<?= $mbl["jenis"] ?>&warna=<?= $mbl["warna"] ?>&topspeed=<?= $mbl["topspeed"] ?>&gambar=<?= $mbl["gambar"] ?>">tipe: <?= $mbl["tipe"]?></a>
 		</li>
 	<?php endforeach; ?>
 	</ul>
 
 </body>
 </html>