<?php
// Ruta del archivo CSV
$file = 'invitados.csv';

// Verificar si el archivo ya existe
$csvExists = file_exists($file);

// Recibir los datos del formulario
$name = $_POST['name'];
$guests = $_POST['guests'];

// Abrir el archivo en modo "append" (agregar)
$handle = fopen($file, 'a');

// Si el archivo no existe, escribir la cabecera (una sola vez)
if (!$csvExists) {
    fputcsv($handle, ['Nombre', 'Número de Invitados', 'Fecha de Confirmación']);
}

// Escribir los datos del formulario en el archivo CSV
fputcsv($handle, [$name, $guests, date('Y-m-d H:i:s')]);

// Cerrar el archivo
fclose($handle);

// Mostrar mensaje de confirmación
echo "<h1>Gracias, $name, por confirmar tu asistencia. Has registrado $guests invitado(s).</h1>";
?>
