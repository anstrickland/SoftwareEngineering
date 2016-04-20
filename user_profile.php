<?php
  session_start();
  include("includeMe.php");
  include("openDB.php");
  openDB();
  
  
  $userID=($_SESSION['userID']);
  $name=($_SESSION['name']);
  //echo <center>;
  echo "Hi ".$name;
  echo "Your information:";
  echo "UserID: ".$userID;
  echo "Email: ".$email;
  //echo </center>;
?>
