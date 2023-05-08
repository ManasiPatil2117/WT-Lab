<!DOCTYPE html>

<html lang="en">

<head>
	<title>Home</title>
	<link rel="stylesheet" href="../css/navbar.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/home.css?23=swerdsdff">

</head>

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
		<div class="abstract-container">
			<div class="abstract-text">Find your favorite book at the best price possible.</div>
			<div class="abstract-image">
				<img src="../images/books.png" alt="" width="700px" height="500px">
			</div>
		</div>
	</div>
	<script src="../script/routing.js"></script>
</body>

</html>