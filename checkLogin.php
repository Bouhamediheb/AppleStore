<?php

$host = "localhost";
$username = "root";
$password = "root";
$dbname = "DataBaseProjetWeb";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM Users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $query);

    $queryAdmin = "SELECT * FROM Users WHERE email='$email' AND password='$password' AND ROLE='1' ";

    $resultAdmin = mysqli_query($conn, $queryAdmin);



    if ($result) {

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $row['CIN'];

            session_start();
            $_SESSION['userName'] = $row['Name'];
            $_SESSION['userLastName'] = $row['LastName'];

          
            if ($resultAdmin == true) {
                $_SESSION['admin'] = true;
            } else {
                $_SESSION['admin'] = false;
            }





            header('Location: index.php');
            exit;

        } else {

            $error = "L'email ou le mot de passe est incorrect. Veuillez réessayer.";

        }

    } else {

        $error = "Une erreur s'est produite. Veuillez réessayer.";

    }



}

?>
