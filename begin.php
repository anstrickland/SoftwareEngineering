<?php  
	session_start();
	include("header.php"); 
	include("includeMe.php");
	include("openDB.php");
  	openDB();
  	$userID= $_SESSION['userID'];
	echo $userID;
	$query="SELECT User.name FROM User WHERE $userID=User.userID";
	$result=mysql_query($query);
  	if ($result==0) { noerror( $result );} 
 
  	if (noerror($result))
  	{
  	   $row=mysql_fetch_object($result);
           echo $row;
  	}
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
	</center>
</html>
