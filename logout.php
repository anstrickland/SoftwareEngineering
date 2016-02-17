 <?php

/* 
This page logs the user out.  
*/
   session_start();
   $_SESSION['loginok'] = "no";
   ?>
<html>
	<head>
	  <title>  Logout </title> 
	</head>
</html>

<?php
header("Location: home.html"); 
?>