<?php 
require 'functions.php';

// cek tombol submit
if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
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
    <title>Tambah Data Mobil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Tambah data mobil</h1>
        <a class="add-link" href="index.php">Kembali</a>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="gambar">Gambar : </label>
                    <input type="text" name="gambar" id="gambar" required>
                </li>
                <li>
                    <label for="tipe">Tipe : </label>
                    <input type="text" name="tipe" id="tipe" required>
                </li>
                <li>
                    <label for="jenis">Jenis : </label>
                    <input type="text" name="jenis" id="jenis" required>
                </li>
                <li>
                    <label for="warna">Warna : </label>
                    <input type="text" name="warna" id="warna" required>
                </li>
                <li>
                    <label for="topspeed">Topspeed : </label>
                    <input type="text" name="topspeed" id="topspeed" required>
                </li>
                <br>
                <li>
				      <button type="submit" name="submit" class="submit-btn">Tambah Mobil</button>
				</li>
            </ul>
        </form>
    </div>
</body>
</html>
