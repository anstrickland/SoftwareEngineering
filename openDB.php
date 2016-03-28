
  // function openDB()
   //{
//	   $host="localhost:/var/lib/mysql/mysql.sock"; // localhost doesn't work
//	   $user="samdbuser";
//	   $password="samdbpassword";
//	   mysql_connect($host,$user,$password);
//	   mysql_select_db("samdb");
  // }
   

<?php 
{
function openDB()
$link = mysql_connect('mcbitlabcom.fatcowmysql.com', 'thebookclub', 'book2016!');  
if (!$link) {      die('Could not connect: ' . mysql_error());  }  mysql_select_db(misdb);    
}
?>
