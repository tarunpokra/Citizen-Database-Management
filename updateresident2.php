<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Citizen Management Database - Resident Table</title></head>
<body><div class="banner">
        <h1>UPDATE A RESIDENT</h1>
    </div><?php
if (isset($_COOKIE["username"])) { 
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];
    $server = "vlamp.cs.uleth.ca";
    $db = "panr3660"; 

    try {
        $conn = new mysqli($server, $username, $password, $db);
    } catch (Exception $e) {
        echo "Connection Problem: " . $e->getMessage();
        exit; 
    }

    // Correcting the SQL syntax
    $sql = "update RESIDENT set SIN = '$_POST[SIN]', residentName = '$_POST[residentName]', addressOfResidence = '$_POST[addressOfResidence]', regionOfResidence = '$_POST[regionOfResidence]', dateOfBirth = '$_POST[dateOfBirth]', surveillanceLevel = '$_POST[surveillanceLevel]', creditScore = '$_POST[creditScore]' where SIN = '$_POST[oldSIN]'";

    try {
        $conn->query($sql); 
        echo "<h3>Resident updated!</h3>";
    } catch (Exception $e) {
        $err = $conn->errno; 
        if ($err == 1062) {
            echo "<p>Resident ID {$_POST['SIN']} already exists or conflicts with another record!</p>"; 
        } else {
            echo "Error code: $err";
        }
    }

    echo "<a href=\"main.php\">Return</a> to Home Page.";
} else {
    echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}
?></body></html>

