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
	$tipe = htmlspecialchars($data['tipe']);
	$jenis = htmlspecialchars($data['jenis']);
	$warna = htmlspecialchars($data['warna']);
	$topspeed = htmlspecialchars($data['topspeed']);

	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	//query
	$query = "INSERT INTO car VALUES('','$gambar','$tipe','$jenis','$warna','$topspeed')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function upload(){
	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gamabr yang diupload
	if($error === 4){
		echo "<script>
                alert('plih gambar dulu');
                </script>";
        return false;
	}

	//cek apakah ekstensi itu gambar
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namafile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
                alert('bukan gambar');
                </script>";
        return false;
	}

	//ukuran data
	if ($ukuranfile > 3000000) {
		echo "<script>
                alert('gambar kebesaran');
                </script>";
        return false;
	}

	//generate
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	//lolos
	move_uploaded_file("$tmpname", 'img/' . $namaFileBaru);

	return $namaFileBaru;
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

	$gambarLama = htmlspecialchars($data['gambarLama']);
	//cek apakah user pilih gamabr baru
	if($_FILES['gambar']['error']===4){
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

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

function register($data){
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek apakah ada username dup
	$result = mysqli_query($conn,"SELECT username FROM users WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
                alert('udah ada username itu');
                </script>";
        return false;
	}

	//cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
                alert('password salah');
                </script>";
        return false;
	}
	//enkripsi
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambah query
	mysqli_query($conn, "INSERT INTO users VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);
}




 ?>