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


    } else {
        echo " all fields required";
    }









?>