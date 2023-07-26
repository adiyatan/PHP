<?php 
session_start();
if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
require 'functions.php';
if (isset($_POST["login"])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($conn,"SELECT * FROM users WHERE username= '$username'");

	//cek username
	if (mysqli_num_rows($result) === 1) {
		//cek password
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["pas"]) ){
			//set session
			$_SESSION['login']= true;

			header("Location: index.php");
			exit;
		}
	}

	$error = true;
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Include Custom CSS -->
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container mt-5">
		<h1 class="text-center">Halaman Login</h1>
		<?php if (isset($error)) :?>
			<div class="alert alert-danger">Username/password salah</div>
		<?php endif; ?>
		<form action="" method="post">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>
			<div class="form-group">
				<button type="submit" name="login" class="btn btn-primary">Login</button>
			</div>
			<div class="form-group">
				<p>Belum memiliki akun? <a href="regis.php">Registrasi</a></p>
			</div>
		</form>
	</div>

	<!-- Include Bootstrap JS and jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
