<html> <style>
        body {
            font-family: "Space Mono", monospace;
            font-size: 45px;
            font-weight: bold;
            color: gold;
            background-image: url('background.jpg');
            height: 50px;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            text-align: center;
            display: flex;
            flex-direction: column; /* Stack elements vertically */
            align-items: center;
            min-height: 100vh;
            color: gold;
            margin: 0; /* Remove default margin */
        }

        .banner {
            font: "Oswald", sans-serif, bold, gold, 20px;
            width: 100%;
            background-color: #8b0000;
            padding: 50px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }

        .banner h1 {
            font: Impact, sans-serif, bold, gold, 45px;
            margin: 0;
            color: gold;
        }
        /*
        .navigation-menu {
            background-color: #98FB98; 
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            padding: 30px;
            margin-top: 60px;
            width: 80%; 
            max-width: 500px; 
        }
        */
        .nav-button {
            background-color: #43464B;
            font: "Oswald", sans-serif, bold, gold, 45px;
            color: white;
            padding: 15px 32px;
            border: none;
            border-radius: 9px;
            display: inline-block;
            margin: 30px;
            width: 50%; /* Full width buttons */
            height: 100%;
            /* Start https://www.cursors-4u.com */ cursor: url(https://cur.cursors-4u.net/others/oth-5/oth435.cur), auto !important; /* End https://www.cursors-4u.com */
            transition: background-color 0.3s;
        }

        .nav-button:hover {
            background-color: #1B1D1E; 
        }

        .logout-link {
            color: white;
            background-color: transparent;
            padding: 5px;
            margin-top: 200px;
            text-decoration: none;
            font-size: 30px;
        }
        .logout-link:hover {
            text-decoration: underline;
        }
    </style>
<head><title> Manager for the citizens of University Hall </title></head>
<body><div class="banner">
        <h1>QUERY A RESIDENT</h1>
    </div></body></html><?php

if(isset($_COOKIE['username']))
{
   $username = $_COOKIE['username']; 
   $password = $_COOKIE["password"];
   $server = "vlamp.cs.uleth.ca";
   $db = "panr3660"; 
   $SIN = $_POST['SIN']; 

try {
   $conn = new mysqli($server,$username,$password,$db);
} catch (Exception $e) {
  echo $e ->getMessage(); 
}
   $sql = "select * from RESIDENT where SIN='$SIN'";
   $result = $conn->query($sql); 
   if($result->num_rows != 0) 
   { 	
      echo "<table border=1>";
      $rec = $result->fetch_assoc();
	 
      echo "<tr>";
      echo "<td>SIN</td>";
      echo "<td>residentName</td>";
      echo "<td>addressOfResidence</td>";
      echo "<td>regionOfResidence</td>";
      echo "<td>dateOfBirth</td>"; 
      echo "<td>surveillanceLevel</td>"; 
      echo "<td>creditScore</td>"; 
      echo "</tr>";
      echo "<tr>";
      echo "<td>$rec[SIN]</td>";
      echo "<td>$rec[residentName]</td>";
      echo "<td>$rec[addressOfResidence]</td>";
      echo "<td>$rec[regionOfResidence]</td>";
      echo "<td>$rec[dateOfBirth]</td>"; 
      echo "<td>$rec[surveillanceLevel]</td>"; 
      echo "<td>$rec[creditScore]</td>"; 
      echo "</tr>";	
      echo "</table>";
   
   }
   else {
      
      echo "<p>Resident $SIN does not exist!</p>"; 
   
   }

}
else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
   
}

echo "<a href=\"main.php\">Return</a> to Home Page."; 

?>