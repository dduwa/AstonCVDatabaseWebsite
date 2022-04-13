<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Register CV</title>
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
      <a href="logout.php">CV Database</a>
      <a href="registeredcvs.php">View Personal CV</a>

    </div>
  </nav>


<?php

session_start();
$useremail = $_SESSION['email'];
require_once ('../includes/connectdb.php');  

if(isset($_POST['submitted'])){
  
  $name = $_POST['updatename'];
  $keyprogramming = $_POST['updatekeyprogramming'];
  $profile = $_POST['updateprofile'];
  $education = $_POST['updateeducation'];
  $URL = $_POST['updateURL'];
  
  try{
    $currentUser = $_SESSION['email'];
    $sql = "SELECT * FROM cvs WHERE email ='$currentUser'";
    $sql = "UPDATE cvs SET name='$name', keyprogramming='$keyprogramming', profile='$profile', education ='$education', URLlinks ='$URL'  WHERE email='$currentUser'";
    
    // Prepare statement
    $stmt = $db->prepare($sql);
    
    // execute the query
    $stmt->execute();
    
    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  
  
}

echo "<h2> Welcome ".$_SESSION['email']."! </h2>";

?>

  <form id="register" action="UpdateCV.php" method="post">
    <h2> <strong>CV Registration</strong> </h2>
    <label> Name: </label>
    <input type="text" name="updatename" />

    <label> Key Programming Language: </label>
    <input type="text" name="updatekeyprogramming" />

    <br></br>

    <p> Profile </p>
    <textarea name="updateprofile" rows="4" cols="40"> Student profile. </textarea>
    <br>
    <p> Education </p>
    <textarea name="updateeducation" rows="4" cols="40"> Currently Studying... </textarea>
    <br>

    <label> URL links: </label>
    <input type="text" name="updateURL" placeholder="URL Links" />

    <br></br>

    <a href="registeredcvs.php"> </a>
    <input type="submit" name="submit" value="Update CV Details" />
    <input type="reset" value="clear" />
    <input type="hidden" name="submitted" value="true" />
  </form>

</body>

</html>
