<?php
// Start session
session_start();

// Get product details from POST data
$id = $_POST["id"];
$name = $_POST["name"];
$image = $_POST["image"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];


// Create cart if it doesn't exist
if (!isset($_SESSION["cart"])) {
	$_SESSION["cart"] = array();
}

// Add product to cart
array_push($_SESSION["cart"], array(
	"id" => $id,
	"name" => $name,
	"price" => $price,
    "image" => $image,
    "quantity" => $quantity

));

// Redirect back to product page
header("Location: panier.php");
exit();
?>