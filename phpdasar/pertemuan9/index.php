<?php 
//konek
$conn = mysqli_connect("localhost","root","","porsche");
//ambil data  
$result = mysqli_query($conn, "SELECT * FROM car");
if (!$result) {
	echo mysqli_error($conn);
}

//ambil data fetch
// mysqli_fetch_row(); array num
// mysqli_fetch_assoc(); array string
// mysqli_fetch_array(); array num dan string (data double)
// mysqli_fetch_object()

// while ($car = mysqli_fetch_assoc($result)) {
// 	var_dump($car);
// }


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>halaman admin</title>
</head>
<body>
	<h1>Daftar showroom</h1>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>id</th>
			<th>gambar</th>
			<th>jenis</th>
			<th>tipe</th>
			<th>warna</th>
			<th>topspeed</th>
			<th>aksi</th>
		</tr>

		<?php while($car = mysqli_fetch_assoc($result)) : ?>
		<tr>
			<td><?=  $car["id"]; ?></td>
			<td><img src="img/<?=  $car["gambar"]; ?>"></td>
			<td><?=  $car["tipe"]; ?></td>
			<td><?=  $car["jenis"]; ?></td>
			<td><?=  $car["warna"]; ?></td>
			<td><?=  $car["topspeed"]; ?></td>
			<td>
				<a href="">ubah</a> | <a href="">hapus</a>
			</td>
		</tr>
		<?php endwhile; ?>
	</table>
</body>
</html>