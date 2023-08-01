<?php 
// Koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "autoparts360");

if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek apakah ada parameter provinsi_id yang dikirimkan melalui GET request
if (isset($_GET['provinsi_id'])) {
    $provinsi_id = $_GET['provinsi_id'];

    // Query untuk mengambil data daerah berdasarkan provinsi_id
    $query_daerah = "SELECT * FROM daerah WHERE id_provinsi = $provinsi_id";
    $result_daerah = mysqli_query($connection, $query_daerah);

    // Mengambil data daerah hasil query ke dalam array
    $daerah = array();
    while ($row_daerah = mysqli_fetch_assoc($result_daerah)) {
        $daerah[] = $row_daerah;
    }

    // Mengirimkan data sebagai response JSON
    header('Content-Type: application/json');
    echo json_encode($daerah);
}

// Menutup koneksi database
mysqli_close($connection);


?>