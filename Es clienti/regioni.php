<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prenotazioni</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Regioni</h1>
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
        $query = 'SELECT regioni.regione, regioni.area_geografica, prenotazioni.importo, prenotazioni.caparra,prenotazioni.id_cliente
			FROM regioni
			INNER JOIN regioni ON citta.regione = clienti.citta
			INNER JOIN prenotazioni ON clienti.id_cliente = prenotazioni.cliente';

            $result = mysqli_query($mysqli, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $saldo = $row['importo'] - $row['caparra'];
            echo "<div class='prenotazione'>";
            echo "<h2>Nome della regione: " . $row['regione'] . "</h2>";
            echo "<p>Numero di prenotazioni: " . $row['ID_cliente'] . "</p>";
            echo "<p>Importo prenotazione: €" . number_format($row['importo'], 2) . "</p>";
            echo "<p class = 'saldo'>Saldo: €" . number_format($saldo, 2) . "</p>";
            echo "</div>";
            echo "<button class='btn-dettagli'>Salva</button>";
            echo "<button class='btn-dettagli'>Anulla</button>";
        }
        mysqli_close($mysqli);
    ?>
</body>
</html>
