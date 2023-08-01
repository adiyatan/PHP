<?php

$conn = mysqli_connect("localhost", "root", "", "autoparts360");

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo mysqli_error($conn);
	}

	$datas = [];
	while ($data = mysqli_fetch_assoc($result)) {
		$datas[] = $data;
	}
	return $datas;
}

function register($data)
{
    global $conn;

    $firstName = htmlspecialchars(ucwords($data["first-name"]));
    $lastName = htmlspecialchars(ucwords($data["last-name"]));
    $province = htmlspecialchars($data["province"]);
    $city = htmlspecialchars($data["city"]);
    $zip = htmlspecialchars($data["zip"]);
    $fullAddress = htmlspecialchars($data["full-address"]);
    $username = htmlspecialchars($data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);

    // Check if the username already exists
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username already exists.');
                </script>";
        return false;
    }

    // Encrypt the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO users (first_name, last_name, province, city, zip, full_address, username, password) 
            VALUES ('$firstName', '$lastName', '$province', '$city', '$zip', '$fullAddress', '$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "<script>
                alert('Failed to register.');
                </script>";
        return false;
    }
}   