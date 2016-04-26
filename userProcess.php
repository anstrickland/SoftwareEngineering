 <?php

   include("includeMe.php");
   include("openDB.php");
   openDB();

   
   $productID= $_GET['productID'];		//get the order id variable
   $Sold= $_GET['Sold']; // get the new fulfilled value
   
      $query = "UPDATE Product SET"
			."       Sold='Yes' "
			."       WHERE productID = '$productID'"
			."       ;";
		
	$result=mysql_query($query);
	
	header('Location: http://mcbitlab.com/thebookclub/user_profile.php'); exit;   
?>
