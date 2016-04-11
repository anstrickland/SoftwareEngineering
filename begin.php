<?php  
	session_start();
	include("header.php"); 
	include("includeMe.php");
	include("openDB.php");
  	openDB();
  	$userID= $_SESSION['userID'];
	echo $userID;
	$email= $_SESSION['em'];
	echo $email;
?>

<html>
	<center>
	<head>
		<title> Libro To Go </title>
	</head>
	
	<body>
		<p>
			Buy or Sell Your Textbooks Here.
		</p>
		<button type ="button"><a href="buy.php">Buy</a></button>
		<button type ="button"><a href="sell.php">Sell</a></button>
	</body>
	</center>
</html>
