<?php 
require 'functions.php';

$message = '';

if (isset($_POST["register"])) {
	$result = register($_POST);
	if ($result > 0) {
		$message = '<div class="alert alert-success">Berhasil daftar!</div>';
	} else {
		$message = '<div class="alert alert-danger">Gagal daftar!</div>';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Registrasi</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Include Custom CSS -->
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container mt-5">
		<h1 class="text-center">Halaman Registrasi</h1>
		<?php echo $message; ?>
		<form action="" method="post" class="mt-4">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="password2">Konfirmasi Password:</label>
				<input type="password" name="password2" id="password2" class="form-control" required>
			</div>
			<div class="form-group">
				<button type="submit" name="register" class="btn btn-primary">Register</button>
			</div>
			<div class="form-group">
				<p>Sudah memiliki akun? <a href="login.php">Login</a></p>
			</div>
		</form>
	</div>

	<!-- Include Bootstrap JS and jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
