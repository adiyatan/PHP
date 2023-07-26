<?php 

$angka = [[1,2,3],[4,5,6],[7,8,9]];
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>latihan 1</title>
 	<style>
 		.kotak{
 			width: 50px;
 			height: 50px;
 			background-color: salmon;
 			text-align: center;
 			line-height: 50px;
 			margin: 3px;
 			float: left;
 			transition: 1s;
 		}
 		.kotak:hover{
 			transform: rotate(350deg);
 			border-radius: 50%;
 		}
 		.clear{
 			clear: both;
 		}
 	</style>
 </head>
 <body>

 	<?php foreach ($angka as $a) : ?>
 		<?php foreach ($a as $b) : ?>
 		<div class="kotak"><?= $b ?></div>
 		<?php endforeach ?>
 		<div class="clear"></div>
 	<?php endforeach ?>
 </body>
 </html>