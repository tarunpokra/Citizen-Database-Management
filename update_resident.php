<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Manager for the residents of University Hall</title></head>
<body><div class="banner">
        <h1>UPDATE A RESIDENT</h1>
    </div>



<?php
if(isset($_COOKIE['username'])){

   echo "<form action=\"updateresident.php\" method=post>";

   $username = $_COOKIE['username'];
   $password = $_COOKIE['password'];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "panr3660"; 

try {
   $conn = new mysqli($server,$username,$password,$db);
} catch (Exception $e) {
    echo $e->getMessage();
exit; 
}

   $sql = "SELECT SIN, residentName FROM RESIDENT";

   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Resident Name: <select name=\"SIN\">";
	      
      while($val = $result->fetch_assoc())
      {
	     echo "<option value='{$val['SIN']}'>{$val['SIN']} - {$val['residentName']}</option>"; 
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"View\">"; 
   }
   else
   {
      echo "<p> No data entered. </p>"; 
   }

   echo "</form>";
}
else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}

?>

</body>
</html>
