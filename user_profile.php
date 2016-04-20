<?php
  session_start();
  include("includeMe.php");
  include("openDB.php");
  openDB();
  
  
  $userID=($_SESSION['userID']);
  $name=($_SESSION['name']);
  $email=($_SESSION['email']);
  echo "<center>";
  echo "Hi ".$name."\n";
  echo "Your information: \n";
  echo "UserID: ".$userID."\n";
  echo "Email: ".$email."\n";
  echo "These are the books you are trying to sell: \n";
  
  
  echo "</center>";
?>
