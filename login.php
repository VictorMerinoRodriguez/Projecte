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

$name = $_POST["username"];
$pass = $_POST["password"];

$query = mysqli_query($conn,"SELECT * FROM login WHERE username = '".$name."' and password = '".$pass."'");
$nr = mysqli_num_rows($query);

//$query = mysqli_query($conn,"SELECT count(*) FROM login WHERE username = '".$name."' and password = '".$pass."'");
//echo $query;
//$nr = mysqli_fetch_array($query,MSQLI_NUM);


if($nr == 1)
{
	header("Location: ruleta.php");
	session_start();
	$_SESSION['username'] = $name;
}
else if ($nr == 0) 
{
	echo "<script> alert('Usuario o contraseña incorrecta');window.location= 'index.html' </script>";
}
	


?>
