<?php
   function openDB()
   {
	   $host="localhost:/var/lib/mysql/mysql.sock"; // localhost doesn't work
	   $user="samdbuser";
	   $password="samdbpassword";
	   mysql_connect($host,$user,$password);
	   mysql_select_db("samdb");
   }
?>
