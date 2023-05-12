<?php
// Start session
session_start();

// Get product ID from GET data
$id = $_GET["id"];

// Find product in cart and remove it
if (isset($_SESSION["cart"])) {
	foreach ($_SESSION["cart"] as $key => $item) {
		if ($item["id"] == $id) {
			unset($_SESSION["cart"][$key]);
			break;
		}
	}
}

header("Location: panier.php");
exit;

?>