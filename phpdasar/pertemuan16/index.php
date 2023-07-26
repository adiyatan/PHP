<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';
$showroom = query("SELECT * FROM car");

//jika tombol cari dipijit
if (isset($_POST["cari"])) {
    $showroom = cari($_POST['keyword']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-3">Daftar Showroom</h1>
        <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
        <a class="add-link btn btn-primary mb-3" href="tambah.php">Tambah Data Mobil</a>
        <form action="" method="post" class="mb-3">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari disini" autocomplete="off" autofocus>
                <div class="input-group-append">
                    <button type="submit" name="cari" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Tipe</th>
                    <th>Jenis</th>
                    <th>Warna</th>
                    <th>Topspeed</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($showroom as $car) : ?>
                <tr class="fade-in">
                    <td><?= $car["id"]; ?></td>
                    <td><img src="img/<?= $car["gambar"]; ?>" width="80" class="rounded"></td>
                    <td><?= $car["tipe"]; ?></td>
                    <td><?= $car["jenis"]; ?></td>
                    <td><?= $car["warna"]; ?></td>
                    <td><?= $car["topspeed"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $car["id"]; ?>" class="edit-btn btn btn-primary btn-sm">Ubah</a>
                        <a href="hapus.php?id=<?= $car["id"]; ?>" onclick="return confirm('Yakin?');" class="delete-btn btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
