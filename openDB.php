<?php 

function openDB()
{
$link = mysql_connect('mcbitlabcom.fatcowmysql.com', 'thebookclub', 'book2016!');  
if (!$link) {      die('Could not connect: ' . mysql_error());  }  mysql_select_db(misdb);    
}
?>
