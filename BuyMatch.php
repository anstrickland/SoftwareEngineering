<?php
 include("includeMe.php");
 include("openDB.php"); //in the same folder
  openDB();
?>


<html>
<body>

<h1> List of Book Matches </h1>

<?php
	
	$q="SELECT *from Product where ISBN='$ISBN';" ;
 	$result = mysql_query($q); //returning whats in the table
	if(noerror($result))
	{
		tabledump($result);
	}
	
	 
?>
</body>
</html>