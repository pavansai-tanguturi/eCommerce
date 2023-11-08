<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $payment_method = $_POST["payment_method"];
    $user = $_SESSION['user'];
    $cart = $_SESSION['cart'];

    // Calculate the order total
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eCommerce";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $total = 0;
    $order_details = "";

    foreach ($cart as $product_id => $quantity) {
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product_name = $row['name'];
            $product_price = $row['price'];
            $item_total = $quantity * $product_price;
            $total += $item_total;

            // Prepare the order details for display
            $order_details .= "Product: $product_name, Quantity: $quantity, Price: $product_price, Total: $item_total\n";
        }
    }

    // Send an email to the user
    $to = $email;
    $subject = "Order Confirmation";
    $message = "Thank you for your order!\n\n";
    $message .= "Shipping Information:\n";
    $message .= "Full Name: $name\n";
    $message .= "Shipping Address: $address\n";
    $message .= "Payment Method: $payment_method\n";
    $message .= "Order Summary:\n";
    $message .= $order_details;
    $message .= "Total: $total $";

    mail($to, $subject, $message);

    // Store the order data in the database
    $sql = "INSERT INTO orders (user_id, total, shipping_name, shipping_address, payment_method, order_details) VALUES ({$user['id']}, $total, '$name', '$address', '$payment_method', '$order_details')";
    $conn->query($sql);

    // Clear the cart and session data after processing the order
    unset($_SESSION['cart']);

    // Use JavaScript for redirection
    header("Location: order_confirmation.php");
} else {
    // Handle cases where the form was not submitted or redirect to the checkout page
    header("Location: checkout.php");
}
