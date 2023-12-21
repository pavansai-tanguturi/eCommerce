<!DOCTYPE html>
<html>

<head>
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
    
    <title>Shopping Cart</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<style>

    table {
        border-collapse: collapse;
        width: 100%;
    }
    
    th,
    td {
        text-align: left;
        padding: 8px;
    }
    
    th {
        background-color: #dddddd;
    }
    
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    input[type="submit"]{
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 8px 18px;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        margin-top: 20px;
        margin-left: 10px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }


</style>

<body class="sub_page">

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script> -->

<div class="hero_area">
    <div class="bg-box">
        <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section starts -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.php">
                <span><?php
                    session_start();
                    $user = $_SESSION['user'];
                    echo $user['username'];
                    ?> Cart
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                </ul>
                <div class="user_option">
                <a href="register1.php" class="user_link">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </a>
                <a class="cart_link" href="cart.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg> <span class="sr-only">(current)</span>  
                </a>
                </div>
            </div>
            </nav>
        </div>
        </header>
        <!-- end header section -->
    </div>


    <main>
        <section>
            <form action="cart.php" method="post">
                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "eCommerce";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $total = 0;

                    // Handle item removal and quantity updates
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST["remove_product_id"])) {
                            $product_id_to_remove = $_POST["remove_product_id"];
                            // Remove the selected product from the shopping cart
                            unset($_SESSION['cart'][$product_id_to_remove]);
                        } elseif (isset($_POST["update_product_id"])) {
                            $product_id_to_update = $_POST["update_product_id"];
                            $new_quantity = $_POST["update_quantity"];
                            // Update the quantity of the selected product in the shopping cart
                            $_SESSION['cart'][$product_id_to_update] = $new_quantity;
                        }
                    }

                    // Loop through items in cart and display in the table
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
                            echo "<td><form action='cart.php' method='post'><input type='hidden' name='update_product_id' value='$product_id'><input type='number' name='update_quantity' value='$quantity'><input type='submit' value='Update' class='button'></form></td>";
                            echo "<td>$price $</td>";
                            echo "<td>$item_total $</td>";
                            echo "<td><form action='cart.php' method='post'><input type='hidden' name='remove_product_id' value='$product_id'><input type='submit' value='Remove' class='button'></form></td>";
                            echo "</tr>";
                        }
                    }
                    // Display total
                    echo "<tr>";
                    echo "<td colspan='3'>Total:</td>";
                    echo "<td colspan='2'>$total $</td>";
                    echo "</tr>";
                    ?>
                </table>
            </form>
            <form action="checkout.php" method="post">
                <input type="submit" value="Checkout" class="button" />
            </form>
        </section>
    </main>

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>

</body>

</html>
