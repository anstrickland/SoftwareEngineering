<?php  
	session_start();
	include("header.php"); 
	include("includeMe.php");
	include("openDB.php");
  	openDB();
  	$userID= $_SESSION['userID'];
  	$name= $_SESSION['name'];
  	$email= $_SESSION['email'];
	$query="SELECT User.name FROM User WHERE $userID=User.userID";
	$result=mysql_query($query);
  	if ($result==0) { noerror( $result );} 

  	if (noerror($result))
  	{
  	  $nobj=mysql_fetch_array($result);
  	  $name= $nobj['name'];
  	  //echo "Hi" . " " . '<a href = "http://mcbitlab.com/thebookclub/user_profile.php?query='.$name.'">'.$name.'</a>';
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
