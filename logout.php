
<html>
	<head>
	  <h1>  Logout </h1> 
	</head>
</html>


 <?php

/* 
This page logs the user out.  
*/
   session_start();
   $_SESSION['loginok'] = "no";
  

header("Location: home.html"); 
?>