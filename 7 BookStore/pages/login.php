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

	$selectQuery = "SELECT * from book_user where user ='$user' and pass='$pass'";
	$result = $conn->query( $selectQuery);

	if ($result->num_rows > 0) {
		header("Location: http://localhost/Book Store/pages/home.php");
		exit();
	} else {
		echo '<script>alert("Invalid Details!")</script>';
	}
	if ($conn->connect_error) {
		echo "ERROR" . $conn->connect_error;
		die("Connection Failed" . $conn->connect_error);
	}

	mysqli_close($conn);

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
		<form class="login-panel" method="post">
			<input type="text" class="input-field" id="user" name="user" placeholder="Enter Username" required>
			<input type="password" class="input-field" id="pass" name="pass" placeholder="Enter Password" required>
			<button value="LOGIN" class="submit-btn" type="submit" onclick="">SUBMIT</button>
		</form>
	</div>

	<script src="../script/routing.js"></script>
</body>

</html>