<?php  
	session_start();
	include("header.php"); 
	include("includeMe.php");
	include("openDB.php");
        include("style.css");
  	openDB();
  	$userID= $_SESSION['userID'];
  	$name= $_SESSION['name'];
  	$email= $_SESSION['email'];
	$query="SELECT User.name FROM User WHERE $userID=User.userID";
	$result=mysql_query($query);
  	if ($result==0) { noerror( $result );} 


  	if (noerror($result))
  	{

  	  $nobj=mysql_fetch_array($result);
  	  $name= $nobj['name'];
          
                 echo "<div class=container>";
                echo "<table class= jumbotron>";
  	  echo "<h2>Hi" . " " . '<a href = "http://mcbitlab.com/thebookclub/user_profile.php?query='.$name.'">'.$name.'</a></h2>';
                 echo "</div>";      
  	}

?>

<html>
	<center>
	<head>
		<title> Libro To Go </title>
	</head>

<body>

   <div class="col-sm-3"> 
     <img src="bookpic.jpg" alt="image" class="img-circle" height="200" width="200"> 
</div>
   <div class="col-sm-3"> 
    <img src="bookpic.jpg" alt="image" class="img-circle" height="200" width="200"> 
 </div>   
     <div class="col-sm-3"> 
    <img src="bookpic.jpg" alt="image" class="img-circle" height="200" width="200"> 
 </div> 
     <div class="col-sm-3"> 
    <img src="bookpic.jpg" alt="image" class="img-circle" height="200" width="200"> 
 </div> 

</br></br></br></br></br></br></br></br></br></br></br> 

<div class="container">
<div class="jumbotron">

		<p>
			Looking to buy or sell a book? </br>
                        If you are looking to <b>buy</b> a book click the 'Buy' button below and we will help connect you with someone who is selling the book you are looking for! </br>
                        If you are looking to <b>sell</b> a book click the 'Sell' button below and get connected with people who are seeking the book you are selling! </br>

		</p>
		<a href="buy.php"><button type ="button" >Buy</button></a>
		<a href="sell.php"><button type ="button" >Sell</button></a>

	</body>
	</center>
</html>
</div></div>
	</center>
</html>
