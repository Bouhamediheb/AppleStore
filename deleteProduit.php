<?php

$conn = mysqli_connect("localhost", "root", "root", "DataBaseProjetWeb");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = $_POST['id'];




// delete from Products by id
$sql = "DELETE FROM Products WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  echo "Article updated successfully";
} else {
  echo "Error updating article: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
