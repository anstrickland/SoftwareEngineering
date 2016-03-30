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

	echo "Sell matches go here";
	echo $isbn;

  $result=mysql_query($query);
  if ($result==0) { noerror( $result ); }
  if (noerror($result))
  
  echo "result";
  
 ?>
