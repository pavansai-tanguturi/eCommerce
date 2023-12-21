<!DOCTYPE html>
<html>

<head>
    <!-- Include your head content here -->
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Checkout</title>

    <!-- Add your CSS and external stylesheet links here -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/checkout.css">
</head>

    <main>
        <section class="checkout_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout_form">
                            <h2>Checkout <?php
                                session_start();
                                $user = $_SESSION['user'];
                                echo $user['username'];
                                ?></h2>
                            <form action="process_order.php" method="POST">
                                <!-- Shipping Information -->
                                <h3>Shipping Information</h3>
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Shipping Address</label>
                                    <textarea name="address" id="address" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" required>
                                </div>

                                <h3>Payment Information</h3>
                                <p>Cash on Delivery (COD) is the only available payment method for this order.</p>
                                <input type="hidden" name="payment_method" value="cash_on_delivery">

                                <!-- Order Summary -->
                                <h3>Order Summary</h3>
                                <table>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                    <!-- Iterate through the cart and display each item -->
                                    <?php
                                    session_start();
                                    $user = $_SESSION['user'];

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

                                    foreach ($_SESSION['cart'] as $product_id => $quantity) {
                                        $sql = "SELECT * FROM products WHERE id = $product_id";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $name = $row['name'];
                                            $price = $row['price'];
                                            $item_total = $quantity * $price;
                                            $total += $item_total;

                                            echo "<tr>";
                                            echo "<td>$name</td>";
                                            echo "<td>$quantity</td>";
                                            echo "<td>$price $</td>";
                                            echo "<td>$item_total $</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="3">Total:</td>
                                        <td colspan="2"><?php echo "$total $"; ?></td>
                                    </tr>
                                </table>

                                <!-- Submit Button -->
                                <button type="submit" class="button">Place Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Add your footer content here -->
</body>

</html>
