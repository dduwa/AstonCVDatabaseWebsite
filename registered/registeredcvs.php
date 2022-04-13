<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" type="text/css" href="css/style.css"/> 
</head>
<header>
 <h1>AstonCV</h1>
 <p> CV Database Website </p>

</header>
<body>
<nav>
<div class="topnav">
<a href="logout.php">Home</a>
<a href="logout.php">CV Database</a>
<a href="UpdateCV.php">Edit CV Details</a>

</div>
</nav>




</body>
</html>

<?php
	//step 1: start the session, check if the user is not logged in, redirect to start
	session_start();	

	if (!isset($_SESSION['email'])){
		header("Location: ../index.php");
		exit();
	}
	$_SESSION['email'];
	$useremail = $_SESSION['email'];
	echo "<h2> Welcome ".$useremail."! </h2>";
	
	
	// Step2. include the connectdb.php to connect to the database, the PDO object is called $db and run the query to get all the course information 
	require_once ('../includes/connectdb.php');  
	

	try {
		$query="SELECT  * FROM  cvs WHERE email = '$useremail'";
		//run  the query
		$rows =  $db->query($query);
		
	//step 3: display the course list in a table 	
		if ( $rows && $rows->rowCount()> 0) {
		
		?>	
	<table cellspacing="0"  cellpadding="5" id="myTable" >
<tr><th align='left'><b>Name</b></th>   <th align='left'><b>Email</b></th> <th align='left'><b>Key_Programming_Language</b></th> <th align='left'><b>Profile</b></th ><th align='left'><b>Education</b></th ><th align='left'><b>URL_Links</b></th > </tr>
		<?php
		// Fetch and  print all  the records.
			while  ($row =  $rows->fetch())	{
                echo  "<tr><td align='left'>" . $row['name'] . "</td>";
                echo  "<td align='left'>" . $row['email'] . "</td>";
				echo  "<td align='left'>" . $row['keyprogramming'] . "</td>";
				echo  "<td align='left'>" . $row['profile'] . "</td>";
				echo  "<td align='left'>" . $row['education'] . "</td>";
                echo "<td align='left'>". $row['URLlinks'] . "</td></tr>\n";
			}
			echo  '</table>';
		}
		else {
			echo  "<p>No CV found in Database.</p>\n"; //no match found
		}
	}
	catch (PDOexception $ex){
		echo "Sorry, a database error occurred! <br>";
		echo "Error details: <em>". $ex->getMessage()."</em>";
	}
	
?>	
<p> Missing CV details? <a href="UpdateCV.php"> Edit CV </a> </p>

   <p>Would like to log out? <a href="logout.php">Log out</a>  </p>

   

  <?php
//if the form has been submitted
if (isset($_POST['submitted'])){
  #prepare the form input
  
  // connect to the database
  require_once('includes/connectdb.php');
	
  $name=isset($_POST['name'])?$_POST['name']:false;
  $keyprogramming=isset($_POST['keyprogramming'])?$_POST['keyprogramming']:false;
  $profile=isset($_POST['profile'])?$_POST['profile']:false;
  $education=isset($_POST['education'])?$_POST['education']:false;
  $url=isset($_POST['URLlinks'])?$_POST['URLlinks']:false;
  
   try{
     
     #register user by inserting the user info 
     $stat=$db->prepare("insert into cvs (`name`,`keyprogramming`,`profile`,`education`,`URLlinks`) values(?,?,?,?,?)");
     $stat->execute(array($name, $keyprogramming, $profile, $education, $url));
	
     
    }
 catch (PDOexception $ex){
   echo "Sorry, a database error occurred! <br>";
	echo "Error details: <em>". $ex->getMessage()."</em>";
}
}
?>  