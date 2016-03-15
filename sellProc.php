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

 	$emailAddress= $_SESSION['email'];
 	$price = addslashes($_POST['price']);
 	$userID= "SELECT userID FROM User WHERE phoneNumber ='1112223333'";
 	$userID2=mysql_query($userID);
 	 if ($userID2==0) { noerror( $userID2 ); }
 	//$userID= "SELECT userID FROM User WHERE email = '$emailAddress';";
 	$productID="SELECT productID FROM Product WHERE ISBN= '$isbn';";
 	$productID2=mysql_query($productID);
 	 if ($productID2==0) { noerror( $productID2 ); }
 	$now = time();		//the current time
 	$whenPosted= date("m-d-y", $now);
 
 if ($result==0) { noerror( $result ); }

 
 $query="INSERT INTO Sales SET"
 ."       userID='$userID2'" 
 ."      ,productID='$productID2'"
."       ,price='$price'"
."      ,whenPosted='$whenPosted'" 
." ;";
  $result=mysql_query($query);
  

   if ($result==0) { noerror( $result ); }
 
   
 //header('Location: http://mcbitlab.com/thebookclub/sellMatch.php'); exit;
 ?>
