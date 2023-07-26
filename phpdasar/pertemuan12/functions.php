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
  
function tambah($data){
	global $conn;
	//ambil data
	$gambar = htmlspecialchars($data['gambar']);
	$tipe = htmlspecialchars($data['tipe']);
	$jenis = htmlspecialchars($data['jenis']);
	$warna = htmlspecialchars($data['warna']);
	$topspeed = htmlspecialchars($data['topspeed']);

	//query
	$query = "INSERT INTO car VALUES('','$gambar','$tipe','$jenis','$warna','$topspeed')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function hapus($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM car WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	//ambil data
	$id = $data["id"];
	$gambar = htmlspecialchars($data['gambar']);
	$tipe = htmlspecialchars($data['tipe']);
	$jenis = htmlspecialchars($data['jenis']);
	$warna = htmlspecialchars($data['warna']);
	$topspeed = htmlspecialchars($data['topspeed']);

	//query
	$query = "UPDATE car SET gambar = '$gambar',tipe = '$tipe',jenis = '$jenis',warna = '$warna',topspeed = '$topspeed' WHERE id = $id";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function cari($keyword){
	global $conn;
	$keyword = mysqli_real_escape_string($conn, $keyword);

	$query = "SELECT * FROM car WHERE tipe LIKE '%$keyword%' OR jenis LIKE '%$keyword%' OR warna LIKE '%$keyword%' OR topspeed LIKE '%$keyword%'";
	return query($query);
}






 ?>