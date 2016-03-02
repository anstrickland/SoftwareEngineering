<?php
  include("includeMe.php");
  include("openDB.php");
  openDB();


	$title = addslashes($_POST['title']);
	$author = addslashes($_POST['author']);
	$edition = addslashes($_POST['edition']);
	$ISBN = addslashes($_POST['ISBN']);
	
   
$query="INSERT INTO Product SET"
."      title='".addslashes($title)."'" 
."      ,author='".addslashes($author)."'"
."      ,edition='".addslashes($edition)."'" 
."      ,ISBN='".addslashes($ISBN)."'" 
." ;";
 /*
  $result=mysql_query($query);
  if ($result==0) { noerror( $result ); }
 $query="INSERT INTO Sales SET"
."      userID='"($userID)"'" 
."      ,productID='"($newId)"'" 
."      ,price='"($price)"'"
."      ,whenPosted='"($whenPosted)"'" 
." ;";
  $result=mysql_query($query);
  */

   if ($result==0) { noerror( $result ); }
 
   
 //header('Location: http://mcbitlab.com/thebookclub/sellMatch.php'); exit;
?>
