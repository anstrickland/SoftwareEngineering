<?php
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
 
 	$price = addslashes($_POST['price']);
 	$userID= "SELECT userID FROM User";
 	$productID="SELECT productID FROM Product";
 	$whenPosted=CURDATE();

  if ($result==0) { noerror( $result ); }
 $query="INSERT INTO Sales SET"
."       userID='$userID'" 
."      ,productID='$productID'" 
."      ,price='$price'"
."      ,whenPosted='$whenPosted'" 
." ;";
  $result=mysql_query($query);
  

   if ($result==0) { noerror( $result ); }
 
   
 //header('Location: http://mcbitlab.com/thebookclub/sellMatch.php'); exit;
 ?>
