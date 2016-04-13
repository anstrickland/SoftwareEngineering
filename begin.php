<?php  
	session_start();
	include("header.php"); 
	include("includeMe.php");
	include("openDB.php");
  	openDB();
  	$userID= $_SESSION['userID'];
	//echo $userID;
	$query="SELECT User.name FROM User WHERE $userID=User.userID";
	$result=mysql_query($query);
  	if ($result==0) { noerror( $result );} 
 	//echo 'Number of Rows: ' . mysql_num_rows($result);
 
  	if (noerror($result))
  	{
  	  $nobj=mysql_fetch_array($result);
  	  $name= $nobj['name'];
  	  echo "Hi" . " " . $name;
  	  //var_dump($result);
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
