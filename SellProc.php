<?php

	include("includeMe.php");
  include("openDB.php");
  openDB();

	$productID = addslashes($_POST['productID']);
	$title = addslashes($_POST['title']);
	$author = addslashes($_POST['author']);
	$edition = addslashes($_POST['edition']);
	$ISBN = addslashes($_POST['ISBN']);
   
$query="insert into Product(productID, title, author, edition, ISBN) values('$productID','$title', '$author', '$edition', '$ISBN')";



   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }
   
 header("Location: Sale.php");	exit;
?>
