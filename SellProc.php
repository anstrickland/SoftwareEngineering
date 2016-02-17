<?php
  include("includeMe.php");
  include("openDB.php");
  openDB();

	$title = addslashes($_POST['title']);
	$author = addslashes($_POST['author']);
	$edition = addslashes($_POST['edition']);
	$ISBN = addslashes($_POST['ISBN']);
	
	$query = "SELECT MAX(productID) from Product";
        $row = mysql_fetch_row($result);
        $productID = $row[0] + 1;
   
$query="insert into Product(productID, title, author, edition, ISBN) values('$productID','$title', '$author', '$edition', '$ISBN')";



  $result=mysql_query($query);
  if ($result==0) { noerror( $result ); }
   
 header("Location: http://mcbitlab.com/thebookclub/sellMatch.php");	exit;
?>
