<?php  
	include("header.php"); 
?>

<html>
	<head>
	<title> Libro to Go </title>
	</head>
	
	<body>
		<header><h2>Please Enter the ISBN</h2></header>
		
		<section> 
			<!-- needs the action attribute so it can send to php to search database -->
			<form action="buyProc.php" method="POST">
				ISBN </br>
				<input type = "text" name = "isbn" required >
				</br>
				</br>
				<input type = "submit" value = "Find Book" >
			</form>
		</section>
	</body>
</html>