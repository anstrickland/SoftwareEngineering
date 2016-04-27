<?php
   session_start();
   include("includeMe.php");
   include("openDB.php");
   openDB();

date_default_timezone_set("America/New_York");
   		
      echo "This is the register process page";	
      $newId= getMaxOrderId() +1;
	  
$em  = @$_POST[email]; // raw email address, may have bad stuff
$email = addslashes( $em );  // making sure email is okay 
$password  = @$_POST[password];  // password 
$na = @$_POST[name];
$name = addslashes( $na );  // making sure name is okay 
$phoneNumber  = @$_POST[phoneNumber]; // phone number 


        
         $now = time(); // this is a timestamp for right now
         $nowstring = date("Y-m-d", $now );
         $query= "INSERT INTO User SET" 
         ."     name='".addslashes($name)."' "
         ."    ,email='".addslashes($email)."' "
         ."    ,phoneNumber='$phoneNumber' "
         ."    ,password='".addslashes($password)."' "
         ."    ,userID='$newId' "
         ." ;";
         $result=mysql_query($query);
         if ($result==0) { noerror($result); }
 
 
 	function getMaxOrderId()
  {	
	$maxid= 0;
	$query= "SELECT MAX(userID) from User;";
	$result = mysql_query($query);
	if(noerror($result))
	{
		$row = mysql_fetch_row($result);
		$maxid= $row[0];
	}		
	
	return $maxid;
  }	
$_SESSION['userID']=$row['userID'];
$_SESSION['name']=$row['name'];
$_SESSION['newUser']="true";

     header('Location: http://mcbitlab.com/thebookclub/home.html'); exit;
?>
