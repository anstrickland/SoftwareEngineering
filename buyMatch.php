<?php
 session_start();
 include("includeMe.php");
 include("header.php"); 
 include("openDB.php"); //in the same folder
  openDB();
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h2>Results</h2>
<p>These people are selling the book you are looking for:</p> 

<?php
$isbn=$_SESSION['isbn'];
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
			$isbn= $row['ISBN'];
			
			echo "<tr><td style=\"border: 1px solid black;\">$productID</td> <td style=\"border: 1px solid black;\">$title</td> <td style=\"border: 1px solid black;\">$author</td>
			<td style=\"border: 1px solid black;\">$edition</td> <td style=\"border: 1px solid black;\">$isbn</td>";
			
		}
		echo "</table>";
	} 
?>
</div>
</body>
</html>
