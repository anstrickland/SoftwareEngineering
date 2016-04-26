<?php  
	include("header.php"); 
	include("style.css");
?>

<html>
<body>
<center>
  <form action="sellProc.php" method="POST"><script></script>
  <table>
        <tr>
         <td>Title</td>
         <td> <input type="text" name="title"> </td>
      </tr>
      <tr>
         <td>Author</td>
         <td> <input type="text" name="author"> </td>
      </tr>
      <tr>
         <td>Edition</td>
         <td> <input type="text" name="edition"> </td>
      </tr>
      <tr>
         <td>ISBN (10 digit no dashes)</td>
         <td><input type="text" name="isbn" required="required" pattern="[0-9]{9}[0-9Xx]" placeholder="xxxxxxxxxx"></td>
      </tr>
      <tr>
         <td>Book Condition</td>
         <td> <select name ="bookCondition" required="required"">
        <option value=""></option>
        <option value="Excellent">Excellent</option>
        <option value="Good">Good</option>
        <option value="Fair">Fair</option>
        <option value="Bad">Bad</option>
        <option value="Very Poor">Very Poor</option>
</td>
      </tr>
      <tr>
         <td>Price</td>
         <td> <input type="text" name="price" required></td>
      </tr>
      <tr>
      	<td>
      		<input type= "submit" value= "Sell My Book!">
      	</td>	
      </tr>	
  </table>
  </form>
</center>
</body>
</html>
