<?php 
//koneksi
$conn = mysqli_connect("localhost","root","","autoparts360");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo mysqli_error($conn);
	}

	$datas = [];
	while ($data = mysqli_fetch_assoc($result)) {
		$datas[] = $data;
	}
	return $datas;
}
  
function tambah($data){
	global $conn;
	//ambil data
	$nama = htmlspecialchars($data['fullName']);
	$email = htmlspecialchars($data['email']);
	$pesan = htmlspecialchars($data['message']);

	//query
	$query = "INSERT INTO kontak VALUES('','$nama','$email','$pesan')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}


 ?>