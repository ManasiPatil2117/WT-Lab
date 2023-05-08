<!DOCTYPE html>

<html lang="en">

<head>
	<title>Home</title>
	<link rel="stylesheet" href="../css/navbar.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/catalogue.css?df=34rty">
</head>

<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "test";

$conn = new mysqli($serverName, $username, $password, $dbName);

if (mysqli_connect_errno()) {
	die("Connection failed: " . mysqli_connect_error());

}


if ($conn->connect_error) {
	echo "ERROR" . $conn->connect_error;
	die("Connection Failed" . $conn->connect_error);
}

$selectQuery = "select * from books_info";

$result = $conn->query($selectQuery);
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

	<div class="catalogue-container">
		<?php while ($row = $result->fetch_assoc()): ?>
			<div class="book">
				<div class="book-img-container">
					<img class="book-img" src="<?php echo $row["image_url"]; ?>" alt="">
				</div>
				<div class="book-info">
					<div class="book-name">
						<?php echo $row["title"]; ?>
					</div>
					<div class="book-cost">
						₹
						<?php echo $row["price"]; ?>
					</div>
					
					<div class="purchase-options">
						<button class="buy">BUY</button>
						<button class="atc">Cart</button>
					</div>
				</div>

			</div>
		<?php endwhile; ?>


	</div>

	<?php $conn->close(); ?>
	<script src="../script/routing.js"></script>
</body>

</html>