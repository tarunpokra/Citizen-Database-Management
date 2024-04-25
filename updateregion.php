<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Manager for the regions of University Hall</title></head>
<body><div class="banner">
        <h1>UPDATE A REGION</h1>
    </div>



<?php
if(isset($_COOKIE["username"])){

echo "<form action=\"updateregion2.php\" method=post>";

	$username = $_COOKIE["username"];
	$password = $_COOKIE["password"];	
    $server = "vlamp.cs.uleth.ca"; 
    $db = "panr3660"; 

    try {
	    $conn = new mysqli($server,$username,$password,$db);
	} catch (Exception $e) {
	   echo "Connection Problem!";
	   exit; 
	}
	
	$sql = "select * from REGION where regionName = '$_POST[regionName]'";

	$result = $conn->query($sql);
	if(!$result)
	{
	   echo "Problem executing select!";
	   exit; 
	}
        if($result->num_rows!= 0)
	{
       $rec=$result->fetch_assoc(); 
       echo "Region Population: <input type=number name=\"regionPopulation\" value=\"$rec[regionPopulation]\"><br><br>";
	   echo "Region Name: <input type=text name=\"regionName\" value=\"$rec[regionName]\"><br><br>";
       echo "North Border: <input type=number name=\"northBorder\" value=\"$rec[northBorder]\"><br><br>";
	   echo "East Border: <input type=number name=\"eastBorder\" value=\"$rec[eastBorder]\"><br><br>";
	   echo "South Border: <input type=number name=\"westBorder\" value=\"$rec[westBorder]\"><br><br>";
       echo "West Border : <input type=number name=\"southBorder\" value=\"$rec[southBorder]\"><br><br>";
	   echo "<input type=hidden name=\"oldName\" value=\"$_POST[regionName]\">";
	   echo "<input type=submit name=\"submit\" value=\"Update\">"; 


	}
	else
	{
		echo "<p> No data entered! </p>"; 
	}

	echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}
?>


 
</body>
</html>
