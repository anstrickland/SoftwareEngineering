<?php
  session_start();
  include("includeMe.php");
  include("openDB.php");
  openDB()
  
  $query="SELECT * FROM BookOrder SET WHERE $isbn=BookOrder.ISBN";

$result=mysql_query($query);
//if ($result==0) { noerror( $result ); }

if (noerror($result))
	{				
		$nf = mysql_num_fields($result);
		$nr = mysql_num_rows($result);
		echo "<table border='1'> <thead>";
		echo "<caption>";

		echo "</caption> \n";
        echo "<tr>";
		
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
  
?>
