<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Manager for the residents of University Hall</title></head>
<body><div class="banner">
        <h1>DELETE A RESIDENT</h1>
    </div><?php

if (isset($_COOKIE["username"])) {
      
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca";
   $db = "panr3660"; 
   $SIN = $_POST['SIN'];

   $conn = new mysqli($server,$username,$password,$db);
   
   $sql = "delete from RESIDENT where SIN='$SIN'"; 
   
   if($conn->query($sql)) 
   { 
	echo "<h3> Resident deleted!</h3>";
	
   } else {
      $err = $conn->errno; 
      $errtext = $conn->error;
      echo "Error code of $err.";
      echo "Output: $errtext."; 
   }
   echo "<br><br><a href=\"main.php\">Return</a> to Home Page."; 
} else {
      
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
      
   }
?></body></html>