<?php
include_once 'includes/dbh.php';


?>

<table cellspacing="0" cellpadding="5" id="myTable" style="overflow-x:auto">
  <tr>
    <th align='left'><b>#</b></th>
    <th align='left'><b>Name</b></th>
    <th align='left'><b>Email</b></th>
    <th align='left'><b>Key_Programming_Language</b></th>
    <th align='left'><b>View Details</b></th>
  </tr>

  <?php
  class CVdb extends Dbh
  {

    public function getCV()
    {
      try {
        $sql = "SELECT * FROM cvs";
        $statement = $this->connect()->query($sql);

        if ($statement && $statement->rowCount() > 0) {
          // Fetch and print all the records.
          while ($row = $statement->fetch()) { ?>

            <tr>
              <td align='left'><?php echo $row['id'] ?></td>
              <td align='left'><?php echo $row['name'] ?> </td>
              <td align='left'><?php echo $row['email'] ?> </td>
              <td align='left'><?php echo $row['keyprogramming'] ?> </td>
              <td align='left'><a href="view.php?id=<?php echo $row['id'] ?>">
                  <p><strong>View</strong></p>
                </a> </td>
            </tr>
  <?php
          }
        } else {
          echo "<p>No CVs found in Database.</p>";
        }
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
  <title>CV Database</title>
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
    <section id=searchcv>
      <form action="searchdb.php" method="GET">
        <label> Search CV Database </label>
        <input type="text" name="search" value="<?php if (isset($_GET['search'])) {
                                                  echo $_GET['search'];
                                                } ?>">
        <input type="submit" value="Search" />

      </form>
    </section>


    <div class="database">
      <h2> AstonCV Database </h2>
      <?php
      $dbobj = new CVdb();
      echo $dbobj->getCV();
      ?>
    </div>
    </section>
  </body>


  </html>