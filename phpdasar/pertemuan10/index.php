<?php 
require 'functions.php';

$showroom = query("SELECT * FROM car");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Showroom</h1>
        <a class="add-link" href="tambah.php">Tambah Data Mobil</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Tipe</th>
                <th>Jenis</th>
                <th>Warna</th>
                <th>Topspeed</th>
                <th>Aksi</th>
            </tr>

            <?php foreach ($showroom as $car) : ?>
            <tr>
                <td><?= $car["id"]; ?></td>
                <td><img src="img/<?= $car["gambar"]; ?>"></td>
                <td><?= $car["tipe"]; ?></td>
                <td><?= $car["jenis"]; ?></td>
                <td><?= $car["warna"]; ?></td>
                <td><?= $car["topspeed"]; ?></td>
                <td>
                    <a href="" class="edit-btn">Ubah</a> <a href="hapus.php?id=<?= $car["id"]; ?>" onclick="return confirm('Yakin?');" class="delete-btn">Hapus</a>
                </td>

            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
