<?php
  session_start();
  include("includeMe.php");
  include("openDB.php");
  openDB();
  
  
  $userID=($_SESSION['userID']);
  $name=($_SESSION['name']);
  $email=($_SESSION['email']);
  echo "<center>";
  echo "Hi ".$name."\n";
  echo "Your information: \n";
  echo "UserID: ".$userID."\n";
  echo "Email: ".$email."\n";
  echo "These are the books you are trying to sell: \n";
  $q="SELECT * FROM Product 
  JOIN Sales
  ON Sales.productID = Product.productID
  WHERE $userID=Sales.userID";
  
  $result=mysql_query($q);
  if ($result==0) { noerror( $result );} 
  
  if(noerror($result))
	{
		$nf = mysql_num_fields($result);
		$nr = mysql_num_rows($result);
  
  
	   for($i=0; $i<$nr; $i++)
		{
			$row =mysql_fetch_array($result);
			
			     $productID= $row['productID'];
                      
			      $title = $row['title'];
		    	$author = $row['author'];
			$edition= $row['edition'];
		        $bookCondition= $row['bookCondition'];
                      
			$isbn= $row['ISBN'];
			
			echo "<tr> 
                         <td>$name</td>
                         
                          <td>$title</td> 
                         <td>$author</td>
			 <td>$edition</td> 
		        <td>$bookCondition</td> 
                         
                        <td>$isbn</td>";
			
		}
				echo "</table>";
  
  echo "</center>";
?>
