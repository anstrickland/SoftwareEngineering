<?php
 session_start();
 include("includeMe.php");
 include("header.php"); 
 include("openDB.php"); //in the same folder
  openDB();
?>


<html>
<body>

<h1> List of Book Matches </h1>

<?php
	$isbn=$_SESSION['isbn'];
	$q="SELECT * from Product where ISBN='$isbn';" ;
 	$result = mysql_query($q); //returning whats in the table
	if(noerror($result))
	{
		tabledump($result);
	}
	
/*
	$q="SELECT * from Product where ISBN='$isbn';" ;
 	$result = mysql_query($q); //returning whats in the table
	
	if(noerror($result))
	{
		$nr = mysql_num_rows($result);
		echo "<table style=\"border: 1px solid black;\">";

		echo "<th style=\"border: 1px solid black;\">Product ID </th>
			 <th style=\"border: 1px solid black;\">Title</th>
			 <th style=\"border: 1px solid black;\">Author</th>
			 <th style=\"border: 1px solid black;\">Edition</th>
			 <th style=\"border: 1px solid black;\">ISBN </th>";
	   for($i=0; $i<$nr; $i++)
		{
			$row =mysql_fetch_array($result);
			
			$productID= $row['productID'];
			$title = $row['title'];
			$author = $row['author'];
			$edition= $row['edition'];
			$ISBN = $row['isbn'];

			
			echo "<tr><td style=\"border: 1px solid black;\">$productID</td> <td style=\"border: 1px solid black;\">$title</td> <td style=\"border: 1px solid black;\">$author</td>
			<td style=\"border: 1px solid black;\">$edition</td> <td style=\"border: 1px solid black;\">$ISBN</td>";
			
		}
		echo "</table>";
	} */
?>
</body>
</html>
