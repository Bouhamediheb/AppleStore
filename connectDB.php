<?php
$servername="localhost";
$username="root";
$password="root";
$dbname="DataBaseProjetWeb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Erreur de connexion : " . $conn->connect_error);
}

?>
