<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content = "width=device-width, initial-scale= 1.0">
    <title>Database</title>
</head>
<body>
    <h1>The following text comes from the database</h1>
<div>
    <?php
        //Connect
        $databaseHost = 'localhost';
        $databaseName = 'cescot';
        $databaseUsername = 'root';
        $databasePassword = '';
        $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
        //Check connection
        if (!$mysqli) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //Query
        $query = 'SELECT value FROM content';
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_assoc($result);
        echo $row['value'];
        ?>
        </div>
    </body>
</html>

