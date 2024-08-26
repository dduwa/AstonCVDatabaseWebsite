<?php
 include_once 'includes/dbh.php';
?>

<table cellspacing="0"  cellpadding="5" id="myTable" >
<tr><th align='left'><b>Name</b></th>   <th align='left'><b>Email</b></th> <th align='left'><b>Key_Programming_Language</b></th ></tr>

<?php
class CVdb extends Dbh {

	public function getCV(){
    try {
      $sql = "SELECT * FROM cvs";
      $statement = $this->connect()->query($sql);
      
      if ( $statement && $statement->rowCount()> 0) {
        // Fetch and print all the records.
		while($row = $statement->fetch()) {
      echo  "<tr><td align='left'>" . $row['name'] . "</td>";
			echo  "<td align='left'>" . $row['email'] . "</td>";
			echo "<td align='left'>". $row['keyprogramming'] . "</td></tr>\n";
      
    }  
    
    
    }else {
      echo "<p>No CVs found in Database.</p>";
    }
      }
    catch (PDOexception $ex){
      echo "Sorry, a database error occurred! <br>";
      echo "Error details: <em>". $ex->getMessage()."</em>";
    }
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
  <form action="searchdb.php"  method="GET">
    <label> Search CV Database </label>
    <input type="text" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>">
    <input type="submit" value="Search" /> 
  </form>
  </section>


  <div class = "database">
    <h2> AstonCV Database </h2>
  
    <?php 
    $dbobj = new CVdb();
    echo $dbobj->getCV();
    ?>

    </div>
  </body>  
  </html>
  
