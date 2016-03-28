
<html>
	<head>
	  <h1>  Logout </h1> 
	</head>
</html>


<?php
session_start();
unset($_SESSION["session_unset();"]); 
header('Location:http://mcbitlab.com/thebookclub/home.html'); exit;
?>
