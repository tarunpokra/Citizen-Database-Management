<!DOCTYPE html>
<html>
<head>
<style>
        body {
            font-family: "Space Mono", monospace;
            font-size: 45px;
            font-weight: bold;
            color: gold;
            background-image: url('background.jpg');
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
            font: "Oswald", sans-serif, bold, gold, 45px;
            width: 100%;
            background-color: #8b0000; /* Dark background for the banner */
            padding: 50px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Adds a subtle shadow to the banner */
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
            color: white;
            font: "Helvetica", sans-serif, bold, white;
            padding: 10px 15px;
            border: none;
            border-radius: 9px;
            display: inline-block;
            margin: 30px;
            width: 20%; /* Full width buttons */
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
            margin-top: 300px;
            text-decoration: none;
            font-size: 30px;
        }
        .logout-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="banner">
        <h1>POLITICAL PARTY</h1>
    </div>

    <div class="navigation-menu">
        <form action="#" method="post"> 
            <button type="submit" formaction="insert_politicalparty.php" class="nav-button">Insert</button>
            <button type="submit" formaction="delete_politicalparty.php" class="nav-button">Delete</button>
            <button type="submit" formaction="update_politicalparty.php" class="nav-button">Update</button>
            <button type="submit" formaction="query_politicalparty.php" class="nav-button">Query</button>
        </form>
    </div>

    <a href="logout.php" class="logout-link">Logout</a>
</body>
</html>

