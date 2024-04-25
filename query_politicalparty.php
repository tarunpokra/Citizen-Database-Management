<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Citizen Management Database - Political Party Table</title></head>
<body><div class="banner">
        <h1>QUERY A PARTY</h1>
    </div><?php

try{
  
if(isset($_COOKIE["username"]))
{
   echo "<form action=\"querypoliticalparty.php\" method=post>";
	
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];	
   $server = "vlamp.cs.uleth.ca";
   $db = "panr3660"; 

   try {
   $conn = new mysqli($server,$username,$password, $db);
   } catch (Exception $e){
      echo $e->getMessage(); 
      echo "Error connecting!";
      exit; 
   }

   $sql = "SELECT partyName FROM POLITICALPARTY";

   try {
    $result = $conn->query($sql);
   } catch (Exception $e) {
      echo $e->getMessage(); 
      echo "Problem with processing query";
      exit; 
   }

   if($result->num_rows > 0)
   {
      echo "Party Name: <select name=\"partyName\">";
	      
      while($val = $result->fetch_assoc())
      {
            echo "<option value='{$val['partyName']}'>{$val['partyName']} </option>";       
      }
      echo "</select>"; 
      echo "<input type=submit name=\"submit\" value=\"View\">"; 
   }
   else
   {
      echo "<p>There are no parties in the system</p>"; 
   }
   
   echo "</form>";
}
else echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";

} catch (PDOException $ex) {

   echo $ex->getMessage(); 
  }

?>

</body>
</html>