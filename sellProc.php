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
 
 	$_SESSION['email']=$email;
 	$price = addslashes($_POST['price']);
 	$userID= "SELECT userID FROM User WHERE email = $email";
 	$productID="SELECT productID FROM Product ";
 	$now = time();		//the current time
 	$whenPosted= date("m-d-y", $now);
 
 	
  if ($result==0) { noerror( $result ); }
 $query="INSERT INTO Sales SET"
 ."       userID='$userID'" 
 ."      ,productID='$productID'"
."       ,price='$price'"
."      ,whenPosted='$whenPosted'" 
." ;";
  $result=mysql_query($query);
  

   if ($result==0) { noerror( $result ); }
 
   
 //header('Location: http://mcbitlab.com/thebookclub/sellMatch.php'); exit;
 ?>
