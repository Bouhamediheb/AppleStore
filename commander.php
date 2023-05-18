<?php
// Establish database connection
include_once 'connectDB.php';
include_once 'checkLogin.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve cart items from session
$cartItems = $_SESSION["cart"];

// Create a new order in the `Order` table
$orderSql = "INSERT INTO `Order` (order_date) VALUES (NOW())";
if (mysqli_query($conn, $orderSql)) {
    // Get the generated order ID
    $orderId = mysqli_insert_id($conn);

    // Insert cart items into the "OrderLine" table
    foreach ($cartItems as $item) {
        $productId = $item["id"];
        $quantity = $item["quantity"];

        $orderLineSql = "INSERT INTO OrderLine (order_id, product_id, quantity) VALUES ($orderId, $productId, $quantity)";
        mysqli_query($conn, $orderLineSql);
    }

    // Clear the cart after successful order processing
    $_SESSION["cart"] = array();

    // Redirect to a success page or display a success message
    header("Location: success.php");
    exit();
} else {
    // Display an error message if the order insertion fails
    echo "Error creating order: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
