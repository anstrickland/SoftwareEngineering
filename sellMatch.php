<?php
  session_start();
  include("header.php");   
  include("includeMe.php");
  include("openDB.php");
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
<center>
<h2>Results </h2>
<p>The following is a list of people who want to buy your book. You can contact them by using the email address listed beside their name.</p>
<?php  
      $isbn = $_SESSION['isbn'];
      $query="SELECT BookOrder.buyID, User.name, User.email, Product.title, Product.author, Product.edition, Product.ISBN, Product.bookCondition 
     FROM BookOrder 
     JOIN User
     ON BookOrder.userID = User.userID
     JOIN Product
     ON BookOrder.ISBN = Product.ISBN
WHERE $isbn=BookOrder.ISBN";



  $result=mysql_query($query);
  if ($result==0) { noerror( $result );} 
 
  if (noerror($result))
	{				

                echo "<div class=container>";
                echo "<table class= table table-striped>";
		$nf = mysql_num_fields($result);
		$nr = mysql_num_rows($result);
		//echo $nr; 
		//echo "<table border='1'> <thead>";
		//echo "<caption>";

		//echo "</caption> \n";
       echo "<tr>";

			echo "<th> Name </th>";
			echo "<th> Email </th>";
			echo "<th> Title </th>";
			echo "<th> Author </th>";
			echo "<th> Edition </th>";
			echo "<th> ISBN </th>";
		//	echo "<th> Book Condition </th>";
        echo "</tr>";
        echo "</thead><tbody>";
		for($i=0; $i<$nr; $i++)
		{
                      
                     $row=mysql_fetch_array($result);			

                       $name= $row['name'];
                        $email= $row['email'];
			$title = $row['title'];
			$author = $row['author'];
			$edition= $row['edition'];
			$isbn= $row['ISBN'];
		//	$bookCondition= $row['bookCondition'];
			
			echo "<tr> 
                         <td>$name</td>
                         <td>$email</td>
                          <td>$title</td> 
                         <td>$author</td>
			 <td>$edition</td> 
                        <td>$isbn</td>;

		}
		   
      echo "</tbody></table></div>";
	} 
?>
</center>
</div>
</body>
</html>
