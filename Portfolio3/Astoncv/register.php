<?php
//if the form has been submitted
if (isset($_POST['submitted'])) {

  #prepare the form input

  // connect to the database
  include('includes/connectdb.php');

  $name = isset($_POST['name']) ? $_POST['name'] : false;
  $email = isset($_POST['email']) ? $_POST['email'] : false;
  $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : false;

  /*if (empty($name)){
    echo "Name is required.";
      exit;
    }
  if (empty($email)){
    echo "Email is required.";
     exit;
  }
    if (empty($password)){
    exit("Password is required.");
    }*/

  if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    try {
      #register user by inserting the user info 
      $stat = $db->prepare("INSERT INTO cvs (`name`,`email`,`password`) VALUES (:name,:email,:password) ");
      $stat->execute(array(":name" => $name, ":email" => $email, ":password" => $password));

      $id = $db->lastInsertId();
      echo "Congratulations! You are now registered. Your ID is: $id  ";
    } catch (PDOexception $ex) {
      echo "Sorry, a database error occurred! <br>";
      echo "Error details: <em>" . $ex->getMessage() . "</em>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Registration System</title>
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
      <a href="index.php">Home</a>
      <a href="CVdb.php">CV Database</a>
      <a href="register.php">Register</a>

    </div>
  </nav>
  <section id="register">
    <h2>Register</h2>
    <form method="post" action="register.php">
      <label>Name </label> <input type="text" name="name" required /> <br>

      <label>Email </label> <input type="email" name="email" required pattern=".+(\.ac|\.com|\.uk|\.edu)" title="Please enter a valid university email address." /> <br>

      <label>Password </label><input type="password" name="password" required /> <br>

      <br>
      <input type="submit" value="Register" />
      <input type="reset" value="clear" />
      <input type="hidden" name="submitted" value="true" />
      <br>
    </form>
    <p> Already a User? </p>
    <a href="index.php">
      <button type="button">Log In</button>
    </a>
  </section>

</body>
</section>
</html>