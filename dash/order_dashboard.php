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

// Fetch orders from the database
$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <style>
    /* Body styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    /* Container styles */
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Order dashboard styles */
    .order_dashboard {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin: 20px 0;
    }

    /* Order item styles */
    .order_item {
        border: 1px solid #ddd;
        padding: 20px;
        margin: 20px 0;
        border-radius: 5px;
    }

    .completed-checkbox {
            position: absolute;
            top: 10px;
            right: 10px;
        }

    /* Heading styles */
    h2 {
        font-size: 24px;
        margin: 0;
    }

    h3 {
        font-size: 18px;
        margin: 0;
        color: #333;
    }

    /* Paragraph styles */
    p {
        margin: 5px 0;
    }

    /* Preformatted text (order details) styles */
    pre {
        white-space: pre-wrap;
        font-size: 14px;
        background-color: #f8f8f8;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .tick-button {
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

</style>


</head>
<body>
    <main>
        <section class="order_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="order_dashboard">
                            <h2>Order Dashboard</h2>

                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<div class='order_item'>";
                                    echo "<h3>Order #" . $row['id'] . "</h3>";
                                    echo "<p>Total: $" . $row['total'] . "</p>";
                                    echo "<p>Shipping Name: " . $row['shipping_name'] . "</p>";
                                    echo "<p>Shipping Address: " . $row['shipping_address'] . "</p>";
                                    echo "<p>Payment Method: " . $row['payment_method'] . "</p>";
                                    echo "<p>Order Details:</p>";
                                    echo "<pre>" . $row['order_details'] . "</pre>";
                                    echo "<p>Order Date: " . $row['order_date'] . "</p>";
                                    
                                    // echo "<form method='post'>";
                                    // echo "<input type='hidden' name='order_id' value='" . $row['id'] . "'>";
                                    // echo "<button type='submit' name='mark_completed' class='tick-button'>✅</button>";
                                    // echo "</form>";
                            
                                    echo "</div>";
                                }
                            } else {
                                echo "No orders found.";
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Add your footer content here -->

    <script>
        // Function to handle checkbox click event
        function handleCheckboxClick(orderId, isChecked) {
        // Send an AJAX request to update the order status in the database
        $.post("update_order_status.php", { order_id: orderId, is_completed: isChecked })
            .done(function (data) {
                // Handle the response from the server (e.g., show a success message)
                console.log(data); // You can replace this with your desired action
            })
            .fail(function (error) {
                // Handle any errors from the server (e.g., show an error message)
                console.error(error); // You can replace this with your desired error handling
            });
    }
    
    // Attach click event handlers to checkboxes
    document.querySelectorAll('.completed-checkbox').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const orderId = this.getAttribute('data-order-id');
            const isChecked = this.checked;
            handleCheckboxClick(orderId, isChecked);
        });
    });
    </script>

</body>
</html>
