<?php 
//cek tombol submit
if (isset($_POST['submit'])) {
	if ($_POST['username']=="admin" && $_POST['password']=="123") {
		header("Location: admin.php");
	} else {
		$error = true;
	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<h1>login dealer</h1>
	<?php if(isset($error)) : ?>
		<p style="color: red; font-style: italic;">username/pw salah</p>
	<?php endif; ?>
	<ul>
		<form action="" method="post">
			<li>
				<label for="username">username :</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">password :</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<button type="submit" name="submit">login</button>
			</li>
		</form>	
	</ul>
	
</body>
</html>