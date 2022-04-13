<?php
$db_host = 'localhost';
$db_name = 'cvs';
$email = 'root';
$password = '';

// Creates a PDO object called $db and establishes the MySQL
try{
$db = new PDO("mysql:dbname=$db_name;host=$db_host", $email, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
   /* echo("Failed to connect to the database.<br>");
	echo($ex->getMessage());
	exit;
}
?> */
?>
<!-- Error message in HTML, when error is caught. -->
<p>Failed to connect to the database.</p>
<p> Error details: <em> <?= $ex->getMessage() ?> </em></p>

<?php
}
?>