<?php
  session_start();
  include("includeMe.php");
  include("openDB.php");
  openDB();
  
$complete="No";

	$title = addslashes($_POST['title']);
	$author = addslashes($_POST['author']);
	$edition = addslashes($_POST['edition']);
	$isbn = addslashes($_POST['isbn']);
	$bookCondition= ($_POST['bookCondition']);
   
$query="INSERT INTO Product SET"
."      title='$title'" 
."      ,author='$author'"
."      ,edition='$edition'" 
."      ,ISBN='$isbn'" 
."      ,bookCondition='$bookCondition'" 
."      ,Sold='$complete'" 
." ;";

$result=mysql_query($query);
if ($result==0) { noerror( $result ); }

$isbn=@addslashes($_POST['isbn']);
$_SESSION['isbn']=$isbn;
 	$price = addslashes($_POST['price']);
 	$userID=($_SESSION['userID']);
 //	echo $userID;
 	$productID="SELECT productID FROM Product WHERE Product.ISBN= '$isbn' limit 1";
 	$productID2=mysql_query($productID);
 	
 	if(noerror($productID2))
 	{
 	   $obj = mysql_fetch_object($productID2);
 	}
 	
 	//echo $obj->productID;
 	$price = addslashes($_POST['price']);
 	//echo mysql_fetch_row($productID2);
 	$now = time();		//the current time
 	$whenPosted= date("Y-m-d", $now);
 
 
 $query="INSERT INTO Sales SET userID='$userID'," 
 		."productID=$obj->productID,"
		."price='$price',"
		."whenPosted='$whenPosted';"; 
  //$result=
  mysql_query($query);
  if ($result==0) { noerror( $result ); }
 
  $_SESSION['isbn'] = $isbn; 
   
 header('Location:http://mcbitlab.com/thebookclub/sellMatch.php'); exit;
	
?>
