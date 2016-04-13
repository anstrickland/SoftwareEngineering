<?php
  session_start();
  include("includeMe.php");
  include("openDB.php");
  openDB();
  
  
  $userID=($_SESSION['userID']);
  echo $userID;
?>
