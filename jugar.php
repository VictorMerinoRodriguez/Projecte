<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "users";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
    die("No hay conexión: ".mysqli_connect_error());
}


// Obtener el registro del usuario
$username = $_SESSION['username'];

// Restar los puntos
$points = $_SESSION['points'];
$puntos_a_quitar = 10; // Cantidad de puntos que quieres quitar
$nuevos_puntos = $points - $puntos_a_quitar;

// Actualizar el registro
mysqli_query($conn, "UPDATE login SET points = 50000 WHERE username = 'admin'");

// Cerrar la conexión
mysqli_close($conn);
?>