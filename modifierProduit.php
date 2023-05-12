<?php

$conn = mysqli_connect("localhost", "root", "root", "DataBaseProjetWeb");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_FILES['image']['tmp_name'];

if ($image) {
  $imageData = file_get_contents($image);
  $imageEncoded = base64_encode($imageData);
} else {
  $sql = "SELECT imageProduct FROM Products WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $imageEncoded = $row['imageProduct'];
}

$sql = "UPDATE Products SET NameProd='$name', PriceProd='$price', imageProduct='$imageEncoded' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  echo "Article updated successfully";
} else {
  echo "Error updating article: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
