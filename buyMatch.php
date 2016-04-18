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
<center>


<?php

        $isbn=$_SESSION['isbn'];
        $q="SELECT Sales.saleID, Sales.price, User.name, User.email, Product.title, Product.author, Product.edition, Product.ISBN, Product.bookCondition 
        FROM Sales
        JOIN User
        ON Sales.userID = User.userID
        JOIN Product
        ON Sales.productID = Product.productID
        WHERE $isbn=Product.ISBN";

 	$result = mysql_query($q); //returning whats in the table
	if ($result==0) { noerror( $result );} 
	
	if(noerror($result))
	{
		$nf = mysql_num_fields($result);
		$nr = mysql_num_rows($result);
                echo "<div class=container>";                
                echo "<table class =table table-striped>";
  

		echo "
	 	      <th>Seller Name</th>
                      <th>Seller Email</th>
		      <th>Title</th>
		      <th>Author</th>
		      <th>Edition</th>
		      <th>Price </th>
		      <th>Book Condition</th>
                       <th>ISBN</th>";

	   for($i=0; $i<$nr; $i++)
		{
			$row =mysql_fetch_array($result);
			
			//$productID= $row['productID'];
                       //$saleID= $row['saleID'];
                       $name= $row['name'];
                        $email= $row['email'];
			$title = $row['title'];
			$author = $row['author'];
			$edition= $row['edition'];
                       $price= $row['price'];
                       $bookCondition= $row['bookCondition'];
			$isbn= $row['ISBN'];
			
			echo "<tr> 
                         <td>$name</td>
                         <td>$email</td>
                          <td>$title</td> 
                         <td>$author</td>
			 <td>$edition</td> 
                         <td>$$price</td>
                        <td>$bookCondition</td> 
                        <td>$isbn</td>";
			
		}
		echo "</table>";
                 echo "</div>";  echo "</div>";  
	} 

?>
</div>
</body>
</center>
</html>
