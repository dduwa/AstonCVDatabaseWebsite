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
      <p> Already a User? </p>
  <a  href = "index.php" >  
         <button type="button">Log In</button> 
  </a>       
    </header>
  <body>
  <nav>
  <div class="topnav">
    <a href="index.php">Home</a>
    <a href="CVdb.php">CV Database</a>
    <a href="register.php">Register Now!</a>
   
  </div>  
  </nav>
  <section id="searchcv">
  
    <h2> Search CV Database </h2>
    <table cellspacing="0"  cellpadding="5" id="myTable" >
<tr><th align='left'><b>Name</b></th>   <th align='left'><b>Email</b></th> <th align='left'><b>Key_Programming_Language</b></th> <th align='left'><b>Profile</b></th ><th align='left'><b>Education</b></th ><th align='left'><b>URL_Links</b></th > </tr>
  </section>
  
  </body>  
  </html>

  <?php
  require_once ('includes/connectdb.php');
  if(isset($_GET['search'])){
      $filtervalues = $_GET['search'];
      $query = "SELECT * FROM cvs WHERE CONCAT(name, keyprogramming) LIKE '%$filtervalues%'";
      //run the query
      $rows = $db->query($query);

      if ( $rows && $rows->rowCount()> 0) {
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
      }else{
        echo  "<p>No CV match found in Database.</p>\n"; //no match found
      }
  }   
  ?>

  <p> Search again? </p> <a href="CVdb.php" > Return to CV Database </a>