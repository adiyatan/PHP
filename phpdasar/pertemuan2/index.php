<?php 
//bisa pake print_r/vardump/echo
// var_dump("adiya");
$nama= 'adiya';
$nama .= 'tan';

echo "halo, aku $nama";

$x=10;
$y=12;
echo $y + $x;

$nama_depan = "adiya";
$nama_belakang = "tan";

echo $nama_depan. "". $nama_belakang;
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>tes</title>
 </head>
 <body>
 <h1>selamat datang <?= $nama  ?></h1>
 <p><?= "ini adalah paragraph" ?></p>

 </body>
 </html>