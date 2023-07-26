<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

// Konfigurasi pagination
$jumlahDataPerhalaman = 2;
$jumlahData = count(query("SELECT * FROM car"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

// Cek apakah ada parameter "cari" pada URL
if (isset($_GET["cari"])) {
    $keyword = $_GET["cari"];
    $showroom = cari($keyword);
} else {
    // Jika tidak ada parameter "cari", tampilkan data biasa
    $showroom = query("SELECT * FROM car LIMIT $awalData, $jumlahDataPerhalaman");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-3">Showroom List</h1>
        <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
        <a class="add-link btn btn-primary mb-3" href="tambah.php">Add Car Data</a>
        <form action="" method="get" class="mb-3">
            <div class="input-group">
                <input type="text" name="cari" class="form-control" placeholder="Find here" autocomplete="off" autofocus>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Find</button>
                </div>
            </div>
        </form>


        <!-- pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($halamanAktif > 1) : ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a></li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                    <li class="page-item <?php if ($i == $halamanAktif) echo 'active'; ?>">
                        <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($halamanAktif < $jumlahHalaman) : ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a></li>
                <?php endif; ?>
            </ul>
        </nav>


        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Sub</th>
                    <th>Color</th>
                    <th>Topspeed</th>
                    <th>Actions</th>
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
                        <a href="ubah.php?id=<?= $car["id"]; ?>" class="edit-btn btn btn-primary btn-sm">Change</a>
                        <a href="hapus.php?id=<?= $car["id"]; ?>" onclick="return confirm('Delete data??');" class="delete-btn btn btn-danger btn-sm">Delete</a>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    // Fungsi untuk mengatur animasi fade in pada tabel
    function fadeInTableRows() {
        // Ambil semua baris tabel (elemen <tr>) dengan class "fade-in"
        const tableRows = $(".fade-in");

        // Loop melalui setiap baris tabel dan terapkan animasi fade in menggunakan jQuery
        tableRows.each(function (index) {
            $(this).hide().delay(100 * index).fadeIn(500);
        });
    }

    // Jalankan fungsi fadeInTableRows saat halaman selesai dimuat
    $(document).ready(function () {
        fadeInTableRows();
    });
</script>
</body>
</html>
