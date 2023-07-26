<?php 
function salam($waktu = "datang",$nama="adiya"){
	return "selamat $waktu, $nama";
}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>latihan func</title>
 </head>
 <body>
 	<h1><?= salam() ?></h1>
 </body>
 </html>