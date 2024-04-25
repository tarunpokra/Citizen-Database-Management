<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Manager for the residents of University Hall</title></head>
<body>
<div class="banner">
        <h1>UPDATE A RESIDENT</h1>
    </div>
<?php
if(isset($_COOKIE["username"])){

echo "<form action=\"updateresident2.php\" method=post>";

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
	
	$sql = "select * from RESIDENT where SIN = '$_POST[SIN]'";

	$result = $conn->query($sql);
	if(!$result)
	{
	   echo "Problem executing select!";
	   exit; 
	}
        if($result->num_rows!= 0)
	{
	   $rec=$result->fetch_assoc(); 
       echo "Resident SIN: <input type=number name=\"SIN\" value=\"$rec[SIN]\"><br><br>";
	   echo "Resident Name: <input type=text name=\"residentName\" value=\"$rec[residentName]\"><br><br>";
       echo "Resident Address: <input type=text name=\"addressOfResidence\" value=\"$rec[addressOfResidence]\"><br><br>";
	   echo "Resident Region: <input type=text name=\"regionOfResidence\" value=\"$rec[regionOfResidence]\"><br><br>";
	   echo "Resident Date Of Birth: <input type=text name=\"dateOfBirth\" value=\"$rec[dateOfBirth]\"><br><br>";
       echo "Surveillance Level : <input type=number name=\"surveillanceLevel\" value=\"$rec[surveillanceLevel]\"><br><br>";
	   echo "Credit Score: <input type=number name=\"creditScore\" value=\"$rec[creditScore]\"><br><br>";
	   echo "<input type=hidden name=\"oldSIN\" value=\"$_POST[SIN]\">";
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
