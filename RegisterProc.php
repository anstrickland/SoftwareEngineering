<?php
   $bug = true;
   session_start();
   include("includeMe.php");
   include("openDB.php");
   openDB();
?>

<html>
<head>
<title> Registration Processsing </title>
</head>
<body>
<h2>Registration Processing </h2>

<?php

/* RegisterProc.php
   This page is sent in POST the email4Reg, firstname4reg, lastname4reg,
   password4reg, password4reg2, regnum.   
   They have been checked for length but not funny stuff.
   We make sure the passwords match and that this email is new.
   Then record a temporary Customer record in the database and 
   then send them email for them to ping back with the number.
*/
date_default_timezone_set("America/New_York");
   
$em  = @$_POST[email]; // raw email address, may have bad stuff
$email = addslashes( $em );  // making sure email is okay 
$password  = @$_POST[password];  // password 
$na = @$_POST[name];
$name = addslashes( $na );  // making sure name is okay 
$phoneNumber  = @$_POST[phoneNumber]; // phone number 


    doRegister( $email, $password, $name, $phoneNumber); 


   // register with email, password, name, and phhone number
   // Note: password, name, and email may need slashing
   function doRegister( $em, $password, $name, $phoneNumber)
   {
      
      // find max customerID and add one to get new one
      $query = "SELECT MAX(userID) from User";
      $result = mysql_query( $query );
      if ( noerror( $result ) )
      {
         $row = mysql_fetch_row($result);
         $userID = $row[0] + 1; // might want to check that this is not 1
         
      //   $querydel = "DELETE FROM Register WHERE email='$em';";
      //   mysql_query($querydel);
         
         $now = time(); // this is a timestamp for right now
         $nowstring = date("Y-m-d", $now );
         $query= "INSERT INTO User SET" 
         ."     name='".addslashes($name)."' "
         ."    ,email='".addslashes($email)."' "
         ."    ,phoneNumber='$phoneNumber' "
         ."    ,password='".addslashes($password)."' "
         ."    ,userID='$userID' "
         ." ;";
         $result=mysql_query($query);
         noerror($result);
        
      }
   }

?>

</body>
</html>
