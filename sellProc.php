<?php
  session_start();
  include("includeMe.php");
  include("openDB.php");
  openDB();
  
	$title = addslashes($_POST['title']);
	$author = addslashes($_POST['author']);
	$edition = addslashes($_POST['edition']);
	$isbn = addslashes($_POST['isbn']);
	
$query="INSERT INTO Product SET"
."      title='$title'" 
."      ,author='$author'"
."      ,edition='$edition'" 
."      ,isbn='$isbn'" 
." ;";
$result=mysql_query($query);
if ($result==0) { noerror( $result ); }


 	$price = addslashes($_POST['price']);
 	$userID=($_SESSION['userID']);
 	echo $userID;
 	$productID="SELECT productID FROM Product WHERE Product.ISBN= '$isbn';";
 	$productID2=mysql_query($productID);
 	echo $productID2;
 	$price = addslashes($_POST['price']);
 	//echo mysql_fetch_row($productID2);
 	$now = time();		//the current time
 	$whenPosted= date("Y-m-d", $now);
 
 
 $query="INSERT INTO Sales SET userID='$userID'," 
 		."productID='$productID2',"
		."price='$price',"
		."whenPosted='$whenPosted';"; 
  //$result=
  mysql_query($query);
  if ($result==0) { noerror( $result ); }
 
   
 //header('Location: http://mcbitlab.com/thebookclub/sellMatch.php'); exit;
 ?>
