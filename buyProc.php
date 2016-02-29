<?php
	session_start();
	include("includeMe.php");
	include("openDB.php");
	openDB();
	
	date_default_timeszone_set("American/New_York");
	
	$ibsn_raw = @$_POST[isbn];	//the isbn number, unsecured
	$isbn_slash = addslashes($isbn_raw);	//safely feature for isbn field
	
	$now = time();		//the current time
	$order_placed = date("m-d-y", $now);
	
	//placing the isbn number in the order table
	//also places the date in the table (not sure if works)
	$query = "INSERT INTO Order SET". "ISBN='".addslashes($isbn_slash)."'"
	."whenOrderPlaced = '$order_placed';";
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
	
?>
	
	
	

?>