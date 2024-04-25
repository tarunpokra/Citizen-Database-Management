<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Manager for the political parties of University Hall</title></head>
<body><div class="banner">
        <h1>UPDATE A PARTY</h1>
    </div>



<?php
if(isset($_COOKIE["username"])){

echo "<form action=\"updatepoliticalparty2.php\" method=post>";

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
	
	$sql = "select * from POLITICALPARTY where partyName = '$_POST[partyName]'";

	$result = $conn->query($sql);
	if(!$result)
	{
	   echo "Problem executing select!";
	   exit; 
	}
        if($result->num_rows!= 0)
	{
	   $rec=$result->fetch_assoc(); 
       echo "Party Leader (Resident ID): <input type=number name=\"leader\" value=\"$rec[leader]\"><br><br>";
	   echo "Party Name: <input type=text name=\"partyName\" value=\"$rec[partyName]\"><br><br>";
       echo "Patriotism: <input type=number name=\"patriotism\" value=\"$rec[patriotism]\"><br><br>";
	   echo "<input type=hidden name=\"oldName\" value=\"$_POST[partyName]\">";
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
