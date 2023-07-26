<?php 
require 'functions.php';

//ambildata url
$id = $_GET['id'];

//query
$car = query("SELECT * FROM car WHERE id = $id")[0];


// cek tombol submit
if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'index.php';
                </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Data Mobil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Ubah data mobil</h1>
        <a class="add-link" href="index.php">Kembali</a>
        <form action="" method="post">
        	<input type="hidden" name="id" value="<?= $car["id"]; ?>">
            <ul>
                <li>
                    <label for="gambar">Gambar : </label>
                    <input type="text" name="gambar" id="gambar" value="<?= $car["gambar"]; ?>">
                </li>
                <li>
                    <label for="tipe">Tipe : </label>
                    <input type="text" name="tipe" id="tipe" value="<?= $car["tipe"]; ?>">
                </li>
                <li>
                    <label for="jenis">Jenis : </label>
                    <input type="text" name="jenis" id="jenis" value="<?= $car["jenis"]; ?>">
                </li>
                <li>
                    <label for="warna">Warna : </label>
                    <input type="text" name="warna" id="warna" value="<?= $car["warna"]; ?>">
                </li>
                <li>
                    <label for="topspeed">Topspeed : </label>
                    <input type="text" name="topspeed" id="topspeed" value="<?= $car["topspeed"]; ?>">
                </li>
                <br>
                <li>
				      <button type="submit" name="submit" class="submit-btn">Ubah Mobil</button>
				</li>
            </ul>
        </form>
    </div>
</body>
</html>
