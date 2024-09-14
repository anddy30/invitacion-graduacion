<?php
// Obtener los datos del formulario
$data = json_decode(file_get_contents('php://input'), true);

// Abrir el archivo data.txt en modo append
$file = fopen('data.txt', 'a');

// Escribir los datos en el archivo en formato JSON
fwrite($file, json_encode($data) . "\n");

// Cerrar el archivo
fclose($file);

// Enviar una respuesta exitosa
echo 'Datos guardados correctamente';