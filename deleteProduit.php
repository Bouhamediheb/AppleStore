<?php

$conn = mysqli_connect("localhost", "root", "root", "DataBaseProjetWeb");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = $_POST['id'];




// delete from Products by id
$sql = "DELETE FROM Products WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  echo "Article supprimée avec succès";
} else {
  echo "Erreur suppression : " . mysqli_error($conn);
  }

mysqli_close($conn);

?>
