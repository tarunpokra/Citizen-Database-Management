<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Manager for the regions of University Hall</title></head>
<body><div class="banner">
        <h1>QUERY A REGION</h1>
    </div><?php

if(isset($_COOKIE['username']))
{
   $username = $_COOKIE['username']; 
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca";
   $db = "panr3660"; 
   $regionName = $_POST['regionName']; 

try {
   $conn = new mysqli($server,$username,$password,$db);
} catch (Exception $e) {
  echo $e ->getMessage(); 
}
   $sql = "select * from REGION where regionName='$regionName'";
   $result = $conn->query($sql); 
   if($result->num_rows != 0) 
   { 	
      echo "<table border=1>";
      $rec = $result->fetch_assoc();
	 
      echo "<tr>";
      echo "<td>regionPopulation</td>";
      echo "<td>regionName</td>";
      echo "<td>northBorder</td>";
      echo "<td>eastBorder</td>";
      echo "<td>southBorder</td>"; 
      echo "<td>westBorder</td>"; 
      echo "</tr>";
      echo "<tr>";
      echo "<td>$rec[regionPopulation]</td>";
      echo "<td>$rec[regionName]</td>";
      echo "<td>$rec[northBorder]</td>";
      echo "<td>$rec[eastBorder]</td>";
      echo "<td>$rec[southBorder]</td>"; 
      echo "<td>$rec[westBorder]</td>"; 
      echo "</tr>";	
      echo "</table>";
   
   }
   else {
      
      echo "<p>Region $regionName does not exist!</p>"; 
   
   }

}
else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
   
}

echo "<a href=\"main.php\">Return</a> to Home Page."; 

?></body></html>