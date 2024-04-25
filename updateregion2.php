<html>
<head><link rel="stylesheet" type="text/css" href="style.css" /><title>Citizen Management Database - Resident Table</title></head>
<body><div class="banner">
        <h1>UPDATE A REGION</h1>
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
    $sql = "update REGION set regionPopulation = '$_POST[regionPopulation]', regionName = '$_POST[regionName]', northBorder = '$_POST[northBorder]', eastBorder = '$_POST[eastBorder]', southBorder = '$_POST[southBorder]', westBorder = '$_POST[westBorder]' where regionName = '$_POST[oldName]'";

    try {
        $conn->query($sql); 
        echo "<h3>Region updated!</h3>";
    } catch (Exception $e) {
        $err = $conn->errno; 
        if ($err == 1062) {
            echo "<p>Region {$_POST['regionName']} already exists or conflicts with another record!</p>"; 
        } else {
            echo "Error code: $err";
        }
    }

    echo "<a href=\"main.php\">Return</a> to Home Page.";
} else {
    echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}
?>
</body></html>
