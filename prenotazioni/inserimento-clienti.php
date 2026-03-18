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
        $query = 'SELECT citta.citta, clienti.nome, clienti.cognome,
			prenotazioni.arrivo, prenotazioni.importo, prenotazioni.caparra
			FROM citta
			INNER JOIN clienti ON citta.id_citta = clienti.citta
			INNER JOIN prenotazioni ON clienti.id_cliente = prenotazioni.cliente';
        
            
            $result = mysqli_query($mysqli, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $saldo = $row['importo'] - $row['caparra'];
            echo "<div class='prenotazione'>";
            echo "<p>Cliente: " . $row['nome'] . " " . $row['cognome'] . "</p>";
            echo "<p>Città di residenza: " . $row['citta'] . "</p>";
            echo "</div>";
        }
        mysqli_close($mysqli);
    ?>
</body>