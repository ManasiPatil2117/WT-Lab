<!DOCTYPE html>

<html lang="en">

<head>
	<title>Home</title>
	<link rel="stylesheet" href="../css/navbar.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" href="../css/catalogue.css">
</head>
<?php

if ($_POST) {

	$serverName = "localhost";
	$username = "root";
	$password = "";
	$dbName = "test";
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$conn = new mysqli($serverName, $username, $password, $dbName);

	if (mysqli_connect_errno()) {
		die("Connection failed: " . mysqli_connect_error());

	}

	if ($conn->connect_error) {
		echo "ERROR" . $conn->connect_error;
		die("Connection Failed" . $conn->connect_error);
	}

	$query = "INSERT INTO book_user VALUES ('$user','$pass')";

	$result = $conn->query($query);
	if ($result) {
		echo '<script>alert("Registered Successfully \nLogin to continue")</script>';
	}

}

?>

<body>
	<div class="nav-bar">
		<div class='org-name'>Book Store</div>
		<div class='nav-options'>
			<div class='nav-option' onClick="navigate('http://localhost/Book Store/pages/home.php')">Home</div>
			<div class='nav-option' onClick="navigate('http://localhost/Book Store/pages/catalogue.php')">Catalogue
			</div>
			<div class='nav-option' onClick="navigate('http://localhost/Book Store/pages/login.php')">Login</div>
			<div class='nav-option' onClick="navigate('http://localhost/Book Store/pages/register.php')">Register</div>
		</div>
	</div>

	<div class="content-container">
		<div id="msg"></div>
		<form method="post" class="login-panel">
			<input type="text" class="input-field" id="user" name="user" placeholder="Enter Username" required>
			<input type="password" class="input-field" id="pass" name="pass" placeholder="Create Password" required>
			<button type="submit" value="Register" class="submit-btn" onclick="">Register</button>
		</form>
	</div>

	<script src="../script/routing.js"></script>
</body>

</html>