<?php
   $bug = false;

   session_start();
   include("includeMe.php");
   include("openDB.php");
   openDB();
   
   date_default_timezone_set("America/New_York");
   
$em = @$_POST[email]; // raw email address, may have bad stuff
$email = addslashes( $em ); // slashes version 
$password = @$_POST[password];
$pwas = addSlashes( $password );

if($em!="" && $em==$email && $password!="" && $password==$pwas ) // no funny stuff
{
   $query="SELECT * FROM User WHERE email='$em'"
       ." AND password='$password'"
       ." ;";
   $result=mysql_query($query);

   if($result==0)
   {
      echo "MySQL Error ".mysql_errno().": ".mysql_error()."<br /> \n"
      ."This is a programming or network error, please report it.<br /> \n";
      // header("Location: logger1Start.php"); 
   }
   elseif (@mysql_num_rows($result)==0)
   {
      $stat = "name/password not found, no loggy inny, sorry <br /> \n";
      // header("Location: logger1Start.php");
   }
   elseif ( mysql_num_rows( $result ) == 1 ) // one match in DB, woohoo!
   {
      //$bug = true;
      if ($bug) { echo "name and password are valid, set up session ... <br /> \n"; }
            
      $row = mysql_fetch_array($result);
      //echo "login successful"; 
      $stat = "login successful";
      $_SESSION['loginok']="yes";
      $_SESSION['first']=$row['first'];
      $_SESSION['userID']=$row['userID'];
       
      if (!$bug) { header('Location: http://mcbitlab.com/thebookclub/begin.html'); exit; }
      else { echo "bug pause, click <a href=\"home.html\">here</a> to continue. <br />\n";}
   }
   else
   {
      $stat="Some weird error occurred.  <br /> \n";
      // header("Location: logger1Start.php"); exit;
   }
   
}
else // there was funny typing, don't even check database, just reject
{
   $stat="your name or password had spaces or funny characters.  Oops.  <br /> \n";
   // header("Location: logger1Start.php"); exit;
}

   echo "<html><body> \n";

   echo "Login failed (or you are debugging).  reason: <br /> \n"; 

   echo $stat;   

   // echo "sessionID=".session_id();
   if ($bug && $stat="login successful" )
   {
      echo "<a href=\"home.html\"> success page </a> ";
   }
   echo "<br /> Just backup or go to the home page if you want to try again.";
?>
</body>
