<?php 
usleep(500000);
require '../functions.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM car WHERE tipe LIKE '%$keyword%' OR jenis LIKE '%$keyword%' OR warna LIKE '%$keyword%' OR topspeed LIKE '%$keyword%'";
$showroom = query($query);
?>
<?php if (!empty($showroom)) : ?>
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
<?php else : ?>
    <p>No data found.</p>
<?php endif; ?>
