<?php  
	include("header.php"); 
	include("style.css");
?>

<html>
	<head>
	<title> Libro to Go </title>
	</head>

	 <center>
	<body>
		<header>
                <h2> Buy A Book </h2>
                 <p>Please Enter the ISBN of the book you are searching for! </p>
                </header>
		

		<section> 
			<!-- needs the action attribute so it can send to php to search database -->
			<form action="buyProc.php" method="POST">
				
				ISBN: <input type = "text" name = "isbn" required >
				</br>
				</br>
				<input type = "submit" value = "Find Book" >
			</form>
		</section>
                </center>
	</body>
</html>
