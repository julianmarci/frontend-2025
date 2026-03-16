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
            echo "<h2>Data di arrivo: " . $row['arrivo'] . "</h2>";
            echo "<p>Cliente: " . $row['nome'] . " " . $row['cognome'] . "</p>";
            echo "<p>Città di residenza: " . $row['citta'] . "</p>";
            echo "<p>Importo prenotazione: €" . number_format($row['importo'], 2) . "</p>";
            echo "<p>Caparra: €" . number_format($row['caparra'], 2) . "</p>";
            echo "<p class = 'saldo'>Saldo: €" . number_format($saldo, 2) . "</p>";
            echo "</div>";
        }
        mysqli_close($mysqli);
    ?>
</body>
</html>