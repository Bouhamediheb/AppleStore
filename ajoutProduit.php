<?php
// Connexion à la base de données

include_once 'connectDB.php';
include_once 'checkLogin.php';



// Récupération des valeurs du formulaire
$name = $_POST['name'];
$reference = $_POST['reference'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$image = $_FILES['image']['tmp_name'];
$imageError = $_FILES['image']['error'];

if ($imageError === UPLOAD_ERR_OK) {
  // File upload was successful
  // Process the uploaded image
  $imageData = file_get_contents($image);
  $imageEncoded = base64_encode($imageData);

  // Rest of your code for inserting the data into the database
  $sql = "INSERT INTO Products (NameProd, ReferenceProd, QuantityProd, PriceProd, imageProduct) VALUES ('$name', '$reference', '$quantity', '$price', '$imageEncoded')";

  if (mysqli_query($conn, $sql)) {
	echo "Article added successfully";
	// echo the image
	echo '<img src="data:image/jpeg;base64,' . $imageEncoded . '" />';
  } else {
	echo "Error adding article: " . mysqli_error($conn);
  }
  
} else {
  // File upload encountered an error
  echo "Error uploading image: ";
  switch ($imageError) {
    case UPLOAD_ERR_INI_SIZE:
      echo "The uploaded file exceeds the upload_max_filesize directive in php.ini";
      break;
    case UPLOAD_ERR_FORM_SIZE:
      echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
      break;
    case UPLOAD_ERR_PARTIAL:
      echo "The uploaded file was only partially uploaded";
      break;
    case UPLOAD_ERR_NO_FILE:
      echo "No file was uploaded";
      break;
    case UPLOAD_ERR_NO_TMP_DIR:
      echo "Missing a temporary folder";
      break;
    case UPLOAD_ERR_CANT_WRITE:
      echo "Failed to write file to disk";
      break;
    case UPLOAD_ERR_EXTENSION:
      echo "A PHP extension stopped the file upload";
      break;
    default:
      echo "Unknown error";
      break;
  }
}

mysqli_close($conn);

?>