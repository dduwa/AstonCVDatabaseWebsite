<?php


 if (isset($_POST['submitted'])){
  if ( !isset($_POST['email'], $_POST['password']) ) {
  // Could not get the data that should have been sent.
   exit('<p>Please fill both the email and password fields!</p>');
    }

  try {
      // connect DB
  include_once 'includes/connectdb.php';
  //Query DB to find the matching email/password
  //using prepare/bindparameter to prevent SQL injection.
    $stat = $db->prepare('SELECT password FROM cvs WHERE email = ?');
    $stat->execute(array($_POST['email']));
      
    // fetch the result row and check 
    if ($stat->rowCount()>0){  // matching email
      $row=$stat->fetch();

      if (password_verify($_POST['password'], $row['password'])){ //matching password
        
        //??recording the user session variable and go to loggedin page?? 
        session_start();
        $_SESSION["email"]=$_POST['email'];
        header("Location:registered/registeredcvs.php");
        exit();
      
      } else {
       echo "<p style='color:red'>Error logging in, password does not match </p>";
         }
      } else {
     //else display an error
      echo "<p style='color:red'>Error logging in, Username not found </p>";
      }
  }
  catch(PDOException $ex) {
    echo("Failed to connect to the database.<br>");
    echo($ex->getMessage());
    exit;
  }

}
?>


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
    <form id="sign-in" action = "index.php" method="post">
       <input type="email" name ="email" placeholder="Email" 
       
       pattern=".+(\.ac\.uk|\.edu\.com\)"
       title="Please enter a valid UK or US university email address." />
        <input type="password" name ="password"
            placeholder="Password" 
             />
         
        <input type="submit" name="submit" value="Log in"/>
    <input type="reset" value="clear"/>
    <!-- hidden field used to check whether form has been 
    submitted or not when PHP part of register.php is written -->
    <input type="hidden" name="submitted" value="true"/>

      </form>
  </header>
<body>
<nav>
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="CVdb.php">CV Database</a>
  <a href="register.php">Register Now!</a>
 
</div>
</nav>
<section id="register-message">
       <h2> Get Employed! </h2>
       <p> A Database Website supporting all Aston University Student CVs.</p>
   <a  href = "register.php" >
       <button type="button">Register Now!</button> 
</a>
    </section>

</body>
</html>

