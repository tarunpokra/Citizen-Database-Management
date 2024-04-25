<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Manager for the political parties of University Hall</title></head>
<body><div class="banner">
        <h1>DELETE A PARTY</h1>
    </div>



<?php

if(isset($_COOKIE["username"])){

   echo "<form action=\"deletepoliticalparty.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca"; 
   $db = "panr3660"; 
   
   $conn = new mysqli($server,$username,$password,$db);

   $sql = "SELECT partyName FROM POLITICALPARTY";
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Party Name: <select name=\"partyName\">";
      
      while($val = $result->fetch_assoc())
      {
            echo "<option value='{$val['partyName']}'>{$val['partyName']}</option>";
	 
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"Delete\">"; 
   }
   else
   {
      echo "<p>No Parties </p>"; 
   }
   
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}
?>


 
</body>
</html>