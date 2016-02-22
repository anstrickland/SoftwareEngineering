<?php
  include("includeMe.php");
  include("openDB.php");
  openDB();

      $newId= getMaxOrderId() +1;

	$title = addslashes($_POST['title']);
	$author = addslashes($_POST['author']);
	$edition = addslashes($_POST['edition']);
	$ISBN = addslashes($_POST['ISBN']);
	
   
$query="insert into Product(productID, title, author, edition, ISBN) values('$newId','$title', '$author', '$edition', '$ISBN')";
  $result=mysql_query($query);
  if ($result==0) { noerror( $result ); }
   
$query="insert into Sales(userID, productID, price, whenPosted) values('$userID','$newId', '$price', '$whenPosted')";
  $result=mysql_query($query);
  if ($result==0) { noerror( $result ); }   
   
   
   	function getMaxOrderId()
  {	
	$maxid= 0;
	$query= "SELECT MAX(productID) from Product;";
	$result = mysql_query($query);
	if(noerror($result))
	{
		$row = mysql_fetch_row($result);
		$maxid= $row[0];
	}		
	
	return $maxid;
  }	
   
 header("Location: http://mcbitlab.com/thebookclub/sellMatch.php");	exit;
?>
