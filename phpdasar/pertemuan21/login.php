<?php 
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	//ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	//cek cookie dan username
	if ($key === hash('sha256', $row["username"])) {
		$_SESSION['login'] = true;
	}
}

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

$message = '';
if (isset($_GET['message']) && $_GET['message'] === 'success') {
    $message = '<div class="alert alert-success">Successful register! Please login.</div>';
}

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

			//cek remember me
			if (isset($_POST['remember'])) {

				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

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
		<h1 class="text-center">Login Page</h1>
		<?php echo $message; ?>
		<?php if (isset($error)) :?>
			<div class="alert alert-danger">Username/password wrong</div>
		<?php endif; ?>
		<form action="" method="post">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control" required>
			</div>
			<div class="form-check">
				<input type="checkbox" name="remember" id="remember" class="form-check-input">
				<label class="form-check-label" for="remember">Remember me</label>
			</div>
			<div class="form-group">
				<button type="submit" name="login" class="btn btn-primary mt-3">Login</button>
			</div>
			<div class="form-group">
				<p>Don't have an account yet? <a href="regis.php">Registration</a></p>
			</div>
		</form>
	</div>

	<!-- Include Bootstrap JS and jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
