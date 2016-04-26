<?php
	session_start();
	include("includeMe.php");
	include("openDB.php");
	openDB();
	
	//$newId = getMaxOrderId()+1;
	
	$isbn = addslashes($_POST['isbn']);	//the isbn number
	$_SESSION['isbn'] = $isbn;
	$now = time();		//the current time
	$orderPlaced = date("Y-m-d", $now);
	$userID = ($_SESSION['userID']);
	
	//placing the isbn number in the order table
	//also places the date in the table (not sure if works)
	$query = "INSERT INTO BookOrder SET"
	."		  userID = '$userID'"
	."        ,ISBN= '$isbn'" 
	."        ,whenOrderPlaced = '$orderPlaced'"
	.";";
	
	$result = mysql_query($query);
	if ($result == 0) { noerror($result);}
	
	 header('Location: http://mcbitlab.com/thebookclub/buyMatch.php'); exit;
	
?>
