<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Log out</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<header>
	<h1>AstonCV</h1>
	<p> CV Database Website </p>

</header>

<body>
	<nav>
		<div class="topnav">
			<a href="logout.php">Home</a>
			<a href="../CVdb.php">CV Database</a>
			<a href="../register.php">Register Now!</a>

		</div>
	</nav>
	<section id="logout">
		<H2> Logged out now! </H2>
		<p>Would like to log in again? </p>
		<a href="..\index.php">
			<button type="button">Log In</button>
		</a>

	</section>
	
</body>

</html>


<?php

session_start();
unset($_SESSION["email"]);
session_destroy();

?>