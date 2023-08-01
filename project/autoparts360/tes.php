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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Alamat</title>
</head>

<body>
    <form>
        <label for="provinsi">Provinsi:</label>
        <select id="provinsi">
            <option value="">Pilih Provinsi</option>
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

            foreach ($provinsi as $row_provinsi) {
                echo '<option value="' . $row_provinsi['id_provinsi'] . '">' . $row_provinsi['nama_provinsi'] . '</option>';
            }

            // Menutup koneksi database
            mysqli_close($connection);
            ?>
        </select>

        <br>

        <label for="daerah">Daerah:</label>
        <select id="daerah">
            <option value="">Pilih Daerah</option>
        </select>
    </form>

    <script>
        // Ambil data daerah dari get_daerah.php menggunakan AJAX
        var provinsiSelect = document.getElementById('provinsi');
        var daerahSelect = document.getElementById('daerah');

        // Fungsi untuk mengisi opsi daerah berdasarkan provinsi yang dipilih
        function populateDaerah(provinsiId) {
            // Hapus semua opsi daerah sebelumnya
            daerahSelect.innerHTML = '<option value="">Pilih Daerah</option>';

            // Jika provinsiId tidak kosong, ambil data daerah dari database
            if (provinsiId !== '') {
                // Ambil data daerah berdasarkan provinsiId dari get_daerah.php menggunakan AJAX
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var daerahData = JSON.parse(xhr.responseText);

                        // Tambahkan opsi daerah ke dalam select
                        for (var i = 0; i < daerahData.length; i++) {
                            var option = document.createElement('option');
                            option.value = daerahData[i].id_daerah;
                            option.textContent = daerahData[i].nama_daerah;
                            daerahSelect.appendChild(option);
                        }
                    }
                };

                xhr.open('GET', 'get_daerah.php?provinsi_id=' + provinsiId, true);
                xhr.send();
            }
        }

        // Tambahkan event listener untuk mengisi daerah berdasarkan provinsi yang dipilih
        provinsiSelect.addEventListener('change', function() {
            var selectedProvinsiId = this.value;
            populateDaerah(selectedProvinsiId);
        });
    </script>
</body>

</html>
