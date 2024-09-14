<?php
// Conectar o crear la base de datos SQLite
$db = new SQLite3('guests.db');

// Crear la tabla si no existe
$db->exec("CREATE TABLE IF NOT EXISTS guests (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    guests INTEGER NOT NULL,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Recibir los datos del formulario
$name = $_POST['name'];
$guests = $_POST['guests'];

// Insertar los datos en la base de datos
$stmt = $db->prepare("INSERT INTO guests (name, guests) VALUES (:name, :guests)");
$stmt->bindValue(':name', $name, SQLITE3_TEXT);
$stmt->bindValue(':guests', $guests, SQLITE3_INTEGER);
$result = $stmt->execute();

// Verificar si se insertaron correctamente los datos
if ($result) {
    echo "<h1>Gracias, $name, por confirmar tu asistencia. Has registrado $guests invitado(s).</h1>";
} else {
    echo "<h1>Hubo un error al procesar tu solicitud. Por favor, inténtalo de nuevo.</h1>";
}

?>
