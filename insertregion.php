<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Manager for the regions of University Hall</title></head>
<body><div class="banner">
        <h1>INSERT A REGION</h1>
    </div><?php
if (isset($_COOKIE['username'])) { 
$username = $_COOKIE['username'];
$password = $_COOKIE['password'];
$server = "vlamp.cs.uleth.ca";
$db = "panr3660"; 

try
{
   $conn = new mysqli($server,$username,$password,$db);
} catch (Exception $e) {
	echo $e -> getMessage();   
}
$sql = "INSERT into REGION (regionPopulation, regionName, northBorder, eastBorder, southBorder, westBorder) VALUES ('$_POST[regionPopulation]', '$_POST[regionName]', '$_POST[northBorder]', '$_POST[eastBorder]', '$_POST[southBorder]', '$_POST[westBorder]')";

if($conn->query($sql))  
{ 
	echo "<h3> New Region added!</h3>";
}

else {
	$err = $conn->errno;
        if ($err == 1062) {
            echo "<p>Region $Name already exists!</p>";
        } else {
            echo "<p>MySQL error code $err: " . $conn->error . "</p>";
        }
    }
   
   echo "<a href=\"main.php\">Return</a> to Home Page.";


} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}

?></body></html>

