<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Citizen Management Database - Resident Table</title></head>
<body><div class="banner">
        <h1>INSERT A PARTY</h1>
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
$sql = "INSERT into POLITICALPARTY (leader, partyName, patriotism) VALUES ('$_POST[leader]', '$_POST[partyName]', '$_POST[patriotism]')";

if($conn->query($sql))  
{ 
	echo "<h3> New Political Party added!</h3>";
}

else {
	$err = $conn->errno;
        if ($err == 1062) {
            echo "<p>partyName $partyName already exists!</p>";
        } else {
            echo "<p>MySQL error code $err: " . $conn->error . "</p>";
        }
    } 
   
   echo "<a href=\"main.php\">Return</a> to Home Page.";


} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}

?></body></html>

