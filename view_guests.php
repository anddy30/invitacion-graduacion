<?php
// Conectar a la base de datos SQLite
$db = new SQLite3('guests.db');

// Consultar las confirmaciones
$result = $db->query('SELECT * FROM guests');

echo "<h1>Lista de Invitados Confirmados</h1>";
echo "<table border='1'>";
echo "<tr><th>Nombre</th><th>Número de Invitados</th><th>Fecha y Hora</th></tr>";

while ($row = $result->fetchArray()) {
    echo "<tr><td>{$row['name']}</td><td>{$row['guests']}</td><td>{$row['timestamp']}</td></tr>";
}

echo "</table>";
?>
