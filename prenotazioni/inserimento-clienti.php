<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prenotazioni</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Prenotazioni</h1>
<?php
	
        $databaseHost = 'localhost';
        $databaseName = 'prenotazioni';
        $databaseUsername = 'root';
        $databasePassword = '';
        $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
        //Check connection
        if (!$mysqli) {
            die("Connection failed: " . mysqli_connect_error());
        } 
        $query = 'SELECT 
            citta.citta,
            clienti.nome,
            clienti.cognome,
          FROM prenotazioni
          INNER JOIN clienti ON prenotazioni.cliente = clienti.id
          INNER JOIN citta ON clienti.citta = citta.id';
    
            
            $result = mysqli_query($mysqli, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $saldo = $row['importo'] - $row['caparra'];
            echo "<div class='prenotazione'>";
            echo "<p>Nome: " . $row['nome'] . "</p>";
            echo "<p>Cognome: " . $row['cognome'] . "</p>";
            echo "<p>Città di residenza: " . $row['citta'] . "</p>";
            echo "<button class='btn-dettagli'>Salva</button>";
            echo "<button class='btn-dettagli'>Anulla</button>";
            echo "</div>";
        }
        mysqli_close($mysqli);
    ?>
</body>