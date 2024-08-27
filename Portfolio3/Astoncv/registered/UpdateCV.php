<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Update CV Details</title>
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
  require_once('../includes/connectdb.php');

  if (isset($_POST['submitted'])) {

    $keyprogramming = $_POST['updatekeyprogramming'];
    $profile = $_POST['updateprofile'];
    $education = $_POST['updateeducation'];
    $URL = $_POST['updateURL'];
    if (!empty($keyprogramming) && !empty($profile) && !empty($education) && !empty($URL)) {
      try {
        $currentUser = $_SESSION['email'];
        $sql = "UPDATE cvs SET  keyprogramming='$keyprogramming', profile='$profile', education ='$education', URLlinks ='$URL'  WHERE email='$currentUser'";

        // Prepare statement
        $stmt = $db->prepare($sql);

        // execute the query
        $stmt->execute();

        // echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . "  Records UPDATED successfully";
      } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
    }
  }

  echo "<h3> Welcome " . $_SESSION['email'] . "! </h3>";

  ?>

<form id="update" action="UpdateCV.php" method="post">
  <div class="viewcv">
    <p> View personal CV <a href="registeredcvs.php"> View CV </a> </p>
  </div>
  <h2> <strong>CV Registration</strong> </h2>

    <label> Key Programming Language: </label>
    <input type="text" name="updatekeyprogramming" required />

    <br></br>

    <p> Profile </p>
    <textarea name="updateprofile" rows="4" cols="40" required> Student profile. </textarea>
    <br>
    <p> Education </p>
    <textarea name="updateeducation" rows="4" cols="40" required> Currently Studying... </textarea>
    <br>

    <label> URL links: </label>
    <input type="text" name="updateURL" placeholder="URL Links" required />

    <br></br>

    <a href="registeredcvs.php"> </a>
    <input type="submit" name="submit" value="Update CV Details" />
    <input type="reset" value="clear" />
    <input type="hidden" name="submitted" value="true" />
  </form>
  
</body>

</html>