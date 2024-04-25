<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Citizen Management Database</title></head>
<body><?php
$username = $_POST['username'];
$password = $_POST['password'];
$server = "vlamp.cs.uleth.ca";
$db = "panr3660";

try {
$con = mysqli_connect($server, $username, $password, $db); 
} catch (Exception $e)
{
	echo $e -> getMessage(); 
}
echo "username is $username and password is $password."; 

setcookie("username",$username,time()+3600);
setcookie("password",$password,time()+3600);

header("Location:main.php"); 

?></body></html>