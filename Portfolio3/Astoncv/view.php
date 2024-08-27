<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>View CV Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<header>
  <h1>AstonCV</h1>
  <p> CV Database Website </p>
  <p> Already a User? </p>
  <a href="index.php">
    <button type="button">Log In</button>
  </a>
</header>

<body>
  <nav>
    <div class="topnav">
      <a href="index.php">Home</a>
      <a href="CVdb.php">CV Database</a>
      <a href="register.php">Register</a>

    </div>
  </nav>

  <section id="detailcv">
    <h2> View CV Details </h2>
    <p> View other CV details? <a href="CVdb.php"> CV Database </a>
    <table cellspacing="0" cellpadding="5" id="table">
      <tr>
        <th align='left'><b>#</b></th>
        <th align='left'><b>Name</b></th>
        <th align='left'><b>Email</b></th>
        <th align='left'><b>Key_Programming_Language</b></th>
        <th align='left'><b>Profile</b></th>
        <th align='left'><b>Education</b></th>
        <th align='left'><b>URL_Links</b></th>
      </tr>
  </section>
  </section>
</body>

</html>



<?php
//Get CV by id
if (isset($_GET['id'])) {
  $filtervalues = $_GET['id'];
  $query = "SELECT * FROM cvs WHERE id ='$filtervalues'";
  include 'includes/connectdb.php';
  //run the query
  $rows = $db->query($query);

  if ($rows && $rows->rowCount() > 0) {
    // Fetch and  print all  the records.
    while ($row =  $rows->fetch()) {
      echo  "<tr><td align='left'>" . $row['id'] . "</td>";
      echo  "<td align='left'>" . $row['name'] . "</td>";
      echo  "<td align='left'>" . $row['email'] . "</td>";
      echo  "<td align='left'>" . $row['keyprogramming'] . "</td>";
      echo  "<td align='left'>" . $row['profile'] . "</td>";
      echo  "<td align='left'>" . $row['education'] . "</td>";
      echo "<td align='left'>" . $row['URLlinks'] . "</td></tr>\n";
    }
    echo  '</table>';
  } else {
    echo  "<p>No CV details found in Database.</p>\n"; //no match found
  }
}
?>