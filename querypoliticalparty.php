<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Manager for the political parties of University Hall</title></head>
<body><div class="banner">
        <h1>QUERY A PARTY</h1>
    </div><?php

if(isset($_COOKIE['username']))
{
   $username = $_COOKIE['username']; 
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca";
   $db = "panr3660"; 
   $partyName = $_POST['partyName']; 

try {
   $conn = new mysqli($server,$username,$password,$db);
} catch (Exception $e) {
  echo $e ->getMessage(); 
}
   $sql = "select r.residentName, p.partyName, p.patriotism
   from POLITICALPARTY p JOIN RESIDENT r ON p.leader = r.SIN where p.partyName ='$partyName'";
   $result = $conn->query($sql); 
   if($result->num_rows != 0) 
   { 	
      echo "<table border=1>";
      $rec = $result->fetch_assoc();
	 
      echo "<tr>";
      echo "<td>Leader</td>";
      echo "<td>partyName</td>";
      echo "<td>patriotism</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>$rec[residentName]</td>";
      echo "<td>$rec[partyName]</td>";
      echo "<td>$rec[patriotism]</td>";
      echo "</tr>";	
      echo "</table>";
   
   }
   else {
      
      echo "<p>Party $partyName does not exist!</p>"; 
   
   }

}
else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
   
}

echo "<a href=\"main.php\">Return</a> to Home Page."; 

?></body></html>