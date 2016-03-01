<?php
  include("includeMe.php");
  include("openDB.php");
  openDB();

      $newId= getMaxOrderId();

	$title = addslashes($_POST['title']);
	$author = addslashes($_POST['author']);
	$edition = addslashes($_POST['edition']);
	$ISBN = addslashes($_POST['ISBN']);
	
   
$query="INSERT INTO Product SET"
."      productID='($newId)'" 
."      ,title='($title)'" 
."      ,author='($author)'"
."      ,edition='($edition)'" 
."      ,ISBN='($ISBN)'" 
." ;";
  $result=mysql_query($query);
  if ($result==0) { noerror( $result ); }
 /*
 $query="INSERT INTO Sales SET"
."      userID='"($userID)"'" 
."      ,productID='"($newId)"'" 
."      ,price='"($price)"'"
."      ,whenPosted='"($whenPosted)"'" 
." ;";
  $result=mysql_query($query);
  */

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
   
 //header('Location: http://mcbitlab.com/thebookclub/sellMatch.php'); exit;
?>
