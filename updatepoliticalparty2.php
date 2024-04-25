<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Citizen Management Database - Resident Table</title></head>
<body><div class="banner">
        <h1>UPDATE A PARTY</h1>
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
    $sql = "update POLITICALPARTY set leader = '$_POST[leader]', partyName = '$_POST[partyName]', patriotism = '$_POST[patriotism]' where partyName = '$_POST[oldName]'";

    try {
        $conn->query($sql); 
        echo "<h3>Party updated!</h3>";
    } catch (Exception $e) {
        $err = $conn->errno; 
        if ($err == 1062) {
            echo "<p>Party Name {$_POST['partyName']} already exists or conflicts with another record!</p>"; 
        } else {
            echo "Error code: $err";
        }
    }

    echo "<a href=\"main.php\">Return</a> to Home Page.";
} else {
    echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}
?></body></html>

