<?php
  session_start();
  include("includeMe.php");
  include("openDB.php");
  openDB();
  
  
  $userID=($_SESSION['userID']);
  $name=($_SESSION['name']);
  echo "Hi ".$name." "."Your userID is ".$userID;
?>
