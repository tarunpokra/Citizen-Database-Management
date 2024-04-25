<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Citizen Management Database - Resident Table</title></head>
<body><div class="banner">
        <h1>DELETE A RESIDENT</h1>
    </div></body>



<?php

if(isset($_COOKIE["username"])){

   echo "<form action=\"deleteresident.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "panr3660"; 
   
   $conn = new mysqli($server,$username,$password,$db);

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
      echo "<input type=submit name=\"submit\" value=\"Delete\">"; 
   }
   else
   {
      echo "<p>No Residents </p>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}
?>


 
</body>
</html>