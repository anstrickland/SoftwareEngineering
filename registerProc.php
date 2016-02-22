<?php
  // $bug = true;
   session_start();
   include("includeMe.php");
   include("openDB.php");
   openDB();

date_default_timezone_set("America/New_York");
   
$em  = @$_POST[email]; // raw email address, may have bad stuff
$email = addslashes( $em );  // making sure email is okay 
$password  = @$_POST[password];  // password 
$na = @$_POST[name];
$name = addslashes( $na );  // making sure name is okay 
$phoneNumber  = @$_POST[phoneNumber]; // phone number 

      
         // find max customerID and add one to get new one
         $query = "SELECT MAX(userID) from User";
         
         $row = mysql_fetch_row($result);
        
          $userID = $row[0] + 1; // might want to check that this is not 1
        

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
         if ($result==0) { noerror($result); }
 

     header('Location: http://mcbitlab.com/thebookclub/start.html'); exit;
?>
