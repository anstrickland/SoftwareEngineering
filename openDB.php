<?php 
  function openDB()
  {
    $host="mcbitlabcom.fatcowmysql.com"; // localhost doesn't work
	  $user="thebookclub";
	  $password="book2016!";
	   mysql_connect($host,$user,$password);
	   mysql_select_db("thebookclub");
  }

?>
