<?php
	session_start();
	include("includeMe.php");
	include("openDB.php");
	openDB();
	
	date_default_timezone_set("America/New_York");
	
	
	$newId = getMaxOrderId()+1;
	
	$ibsn_raw = @$_POST[isbn];	//the isbn number, unsecured
	$isbn_slash = addslashes($isbn_raw);	//safely feature for isbn field
	
	$now = time();		//the current time
	$order_placed = date("Y-m-d", $now);
	
	//placing the isbn number in the order table
	//also places the date in the table (not sure if works)
	$query = "INSERT INTO Order SET"
	. "ISBN='". addslashes($isbn_slash)."' "
	." ;";
	$result = mysql_query($query);
	if ($result == 0) { noerror($result);}
	
	//need function to generate userID
	function getMaxOrderId()
	{
		$maxid = 0;
		$query = "SELECT MAX(userID) from Order;";
		$result = mysql_query($query);
		if(noerror($result))
		{
			$row = mysql_fetch_row($result);
			$maxid = $row[0];
		}
		
		return $maxid;
	}
	 header('Location: http://mcbitlab.com/thebookclub/start.html'); exit;
?>