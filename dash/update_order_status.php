<?php
// Connect to the database (you may need to adjust database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eCommerce";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get order ID and completed status from the AJAX request
$orderID = $_POST['order_id'];
$isCompleted = $_POST['is_completed'];

// Update the order status in the database
$sql = "UPDATE orders SET completed = " . ($isCompleted ? 1 : 0) . " WHERE id = $orderID";
if ($conn->query($sql) === TRUE) {
    echo "Order status updated successfully.";
} else {
    echo "Error updating order status: " . $conn->error;
}

$conn->close();
?>
