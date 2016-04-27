<?php
  session_start();
  include("includeMe.php");
  include("openDB.php");
  include("header.php"); 
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
<div class="jumbotron">
  
<?php
  $userID=($_SESSION['userID']);
  $name=($_SESSION['name']);
  $email=($_SESSION['email']);
  echo "<center>";
  echo "Hi ".$name."";
 echo "</center>";
  echo "<br />";
  echo "Your information: \n";
 echo "<br />";
  echo "UserID: ".$userID."\n";
 echo "<br />";
  echo "Email: ".$email."\n";
 echo "<br />";
  echo "These are the books you are trying to sell: \n";
 echo "<br />";   
echo "<center>";
echo"</div>";

 $q="SELECT * FROM Product 
  JOIN Sales
  ON Sales.productID = Product.productID
  WHERE $userID=Sales.userID";
  
  $result=mysql_query($q);
  if ($result==0) { noerror( $result );} 
 
  if(noerror($result))
	{

                echo "<div class=container>";
                echo "<table class= table table-striped>";
		$nf = mysql_num_fields($result);
		$nr = mysql_num_rows($result);


       echo "<tr>";

			echo "<th> Name </th>";
			echo "<th> Title </th>";
			echo "<th> Author </th>";
			echo "<th> Edition </th>";
		       echo "<th> Book Condition </th>";
                      echo "<th> ISBN </th>";
                       echo "<th> Sold? </th>";
        echo "</tr>";
  
	   for($i=0; $i<$nr; $i++)
		{
			$row =mysql_fetch_array($result);
			
			$productID= $row['productID'];
                        $title = $row['title'];
		    	$author = $row['author'];
			$edition= $row['edition'];          
		        $bookCondition= $row['bookCondition'];
                        $isbn= $row['ISBN'];
                        $Sold= $row['Sold'];
		
                          echo "<tr> 
                        <td>$name</td>
                        <td>$title</td> 
                         <td>$author</td>
		        <td>$edition</td> 
		        <td>$bookCondition</td> 
                        <td>$isbn</td> 
                        <td>$Sold"; 

                       echo "<a href='userProcess.php?Sold=$Sold&productID=$productID'> "
		    ." update </a> <br />\n </td></tr>"; 	//set the new value of fulfilled 
			
		}
				echo "</table>";
  }
  echo "</center>";
?>

</div>
</body>
</html>
