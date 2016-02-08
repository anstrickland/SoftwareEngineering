<?php
   $bug = true;
   session_start();
   include("../includeMe.php");
   include("../openDB.php");
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

if($em!="" && $em==$email && $pw!=""  ) // no funny stuff in email
{
   // user is trying to register.  see if email is already taken
   // If no match, go ahead and add.
   $query= "SELECT COUNT(*) FROM User WHERE email='$em';";
   //echo "query=".$query;
   $result=mysql_query($query);

   if($result==0)
   {
      echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
      echo "This is a server error.  If it persists please tell tech support. ";
      $shtats = "queryerror1";
   }
   elseif (@mysql_num_rows($result)==0)
   {
      echo "<b>Query completed.  Empty result.</b><br>";
      echo "This is a server error.  If it persists please tell tech support. ";
      $shtats = "queryerror2";
   }
   else
   {
      $row = mysql_fetch_row($result);
      if ( $row[0]==0 ) // no match is good
      {
         // registration: email address is
         // not in the database, so add this person as temp and 
         // send email to confirm.

         $shtats = "ok2add";
         doRegister( $em, $pw, @$_POST[firstname4reg], @$_POST[lastname4reg], 
                      @$_POST[regnum]  ); 
      }
      else
      {
         $shtats = "EmailTaken"; 
         echo "An account with this email already exists.  Go back "
         ." and hit the 'forgot password' option if you need to.";
      }
   }
   
}


   // register with email, password, firstname, lastname, and regnum
   // Note: pw, firstname and lastname may need slashing
   function doRegister( $em, $password, $name, $phoneNumber)
   {
      $shtats = "ok2add";
      
      // find max customerID and add one to get new one
      //$query = "SELECT MAX(userID) from User";
      //$result = mysql_query( $query );
      //if ( noerror( $result ) )
      {
         //$row = mysql_fetch_row($result);
         //$userID = $row[0] + 1; // might want to check that this is not 1
         
         $querydel = "DELETE FROM Register WHERE email='$em';";
         mysql_query($querydel);
         
         $now = time(); // this is a timestamp for right now
         $nowstring = date("Y-m-d", $now );
         $query= "INSERT INTO User SET" 
         ."     name='".addslashes($name)."' "
         ."    ,email='".addslashes($email)."' "
         ."    ,phoneNumber=$phoneNumber "
         ."    ,passWord='".addslashes($password)."' "
         //."    ,balance=0 "
         ."    ,email='$em' "
         ." ;";
         $result=mysql_query($query);
         noerror($result);
         
         // send email to user 
         $subj="Registration Confirmation";
         $msg="confirm registration by clicking on this link: <br />"
         ."<a href=\"http://www.bitlab.meredith.edu/~kosterb/school/CS-230/26-login/logger4Confirm.php"
         ."?email=$em&confirmationNumber="
         ."$regnum\" > confirm your email address </a> <br /> <br />"
         ." Thanks "
         ;
         $heads="";

         mail($em,$subj,$msg,$heads);
         //echo "message is ".$msg; // can't do this here, 

         // jump to the page that tells them to check their email
         
         //header("Location: logger4GoRead.php");
         
         echo "Go read your email and click on the link to confirm.  ";
      }
   }

?>

</body>
</html>
