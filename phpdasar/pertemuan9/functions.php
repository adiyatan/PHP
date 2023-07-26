<?php 
//koneksi
$conn = mysqli_connect("localhost","root","","porsche");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo mysqli_error($conn);
	}

	$cars = [];
	while ($car = mysqli_fetch_assoc($result)) {
		$cars[] = $car;
	}
	return $cars;
}
  













 ?>