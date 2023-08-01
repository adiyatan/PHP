<?php 
// Koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "autoparts360");

if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data provinsi
$query_provinsi = "SELECT * FROM provinsi";
$result_provinsi = mysqli_query($connection, $query_provinsi);

// Mengambil data provinsi hasil query ke dalam array
$provinsi = array();
while ($row_provinsi = mysqli_fetch_assoc($result_provinsi)) {
    $provinsi[] = $row_provinsi;
}

// Mengirimkan data sebagai response JSON
header('Content-Type: application/json');
echo json_encode($provinsi);

// Menutup koneksi database
mysqli_close($connection);


?>