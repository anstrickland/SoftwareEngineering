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
				
				ISBN (10 digit, no dashes): <input type = "text" name = "isbn" required="required" pattern="[0-9]{9}[0-9Xx]" placeholder="xxxxxxxxxx">
				</br>
				</br>
				<input type = "submit" value = "Find Book" >
			</form>
		</section>
                </center>
	</body>
</html>
