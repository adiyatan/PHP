<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>post</title>
</head>
<body>
	<?php if (isset(($_POST['tipe']))) :?>
		<h1>berikut adalah produk baru kami,<?= $_POST["tipe"] ?></h1>
	<?php endif; ?>


	<form action="" method="post">
		masukan tipe:
		<input type="text" name="tipe">
		<br>
		<button type="submit" name="submit">kirim</button>
	</form>
</body>
</html>