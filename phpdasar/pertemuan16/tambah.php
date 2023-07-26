<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-3">Tambah data mobil</h1>
        <a class="add-link btn btn-primary mb-3" href="index.php">Kembali</a>
        <form action="" method="post" enctype="multipart/form-data">
            <ul class="list-unstyled">
                <li class="form-group">
                    <label for="gambar">Gambar:</label>
                    <div id="image-preview"></div>
                    <input type="file" name="gambar" id="gambar" class="form-control-file" required>
                </li>
                <li class="form-group">
                    <label for="tipe">Tipe:</label>
                    <input type="text" name="tipe" id="tipe" class="form-control" required>
                </li>
                <li class="form-group">
                    <label for="jenis">Jenis:</label>
                    <input type="text" name="jenis" id="jenis" class="form-control" required>
                </li>
                <li class="form-group">
                    <label for="warna">Warna:</label>
                    <input type="text" name="warna" id="warna" class="form-control" required>
                </li>
                <li class="form-group">
                    <label for="topspeed">Topspeed:</label>
                    <input type="text" name="topspeed" id="topspeed" class="form-control" required>
                </li>
                <br>
                <li>
                    <button type="submit" name="submit" class="submit-btn btn btn-primary">Tambah Mobil</button>
                </li>
            </ul>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- vanila -->
    <script>
        const input = document.getElementById('gambar');
        const imagePreview = document.getElementById('image-preview');

        input.addEventListener('change', function (event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function () {
                const image = new Image();
                image.src = reader.result;
                imagePreview.innerHTML = '';
                imagePreview.appendChild(image);
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>
</html>
