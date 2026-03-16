<doctype html>html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Clienti</title>
</head>
<body>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cescot";
        
$result = mysqli_query($mysqli , $query);
if (!$result) {
    die("Query failed: " . mysqli_error($mysqli));
}

        // Connect
        $conn = new mysqli($servername, $username, $password, $prenotazioni);
        // Control
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT id, nome, cognome, email FROM content";
        $result = $conn->query($sql);
        
    while ($row = mysqli_fetch_assoc($result)) {
        echo 
    "<div>
    <h1> 
        cliente: $row [cliente]
    </h1>
    <h2>
        <p>nome:$row [nome]</p>
        <p>cognome:$row [cognome]</p>
        <p>regione_di_residenza:$row [regione_di_residenza]</p>
        <p>area_geografica:$row [area_geografica]</p>
        <p>importo:$row [importo]</p>
        <p>caparra:$row [caparra]</p>
    </h2>
    </div>";
}
?>
</body>
