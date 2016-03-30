<?php
  session_start();
  include("header.php");   
  include("includeMe.php");
  include("openDB.php");
  openDB();
  
  $isbn = $_SESSION['isbn'];
  $query="SELECT BookOrder.buyID, User.name, Product.title, Product.author, Product.edition, Product.ISBN 
  FROM BookOrder 
  JOIN User
  ON BookOrder.userID = User.userID
  JOIN Product
  ON BookOrder.ISBN = Product.ISBN
  WHERE $isbn=BookOrder.ISBN";

	echo "The following is a list of people who want to buy your book. You can contact them by using the email address listed beside their name. ";


  $result=mysql_query($query);
  if ($result==0) { noerror( $result ); 
  
  if (noerror($result))
	{				
		$nf = mysql_num_fields($result);
		$nr = mysql_num_rows($result);
		echo "<table border='1'> <thead>";
		echo "<caption>";

		echo "</caption> \n";
        echo "<tr>";
		
			echo "<th> Buy ID </th>";
			echo "<th> Name </th>";
			echo "<th> Title </th>";
			echo "<th> Author </th>";
			echo "<th> Edition </th>";
			echo "<th> ISBN </th>";
        echo "</tr>";
        echo "</thead><tbody>";
		for($i=0; $i<$nr; $i++)
		{
			echo "<tr>";
			$row=mysql_fetch_array($result);
		
		
		for ( $j=0; $j<$nf; $j++ )
		{			
				echo "    <td>" . $row[$j] . "</td> \n";
		}
			echo "  </tr> \n";
		}
		   
      echo "</tbody></table>";
	}
?>
