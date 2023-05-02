<?php

$host = "localhost";
$username = "root";
$password = "root";
$dbname = "DataBaseProjetWeb";

$conn = mysqli_connect($host, $username, $password, $dbname);



if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cin']) && isset($_POST['tel'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cin = $_POST['cin'];
    $role = 0;
    $tel = $_POST['tel'];

    $query = "INSERT INTO Users (Name, LastName, Role, CIN, Telephone, email, password) VALUES ('$nom', '$prenom', '$role', '$cin', '$tel','$email','$password')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: login.php');
        exit;
    } else {
        $error = "Erreur de connexion. Veuillez réessayer.";
        echo $error;
    }
}

