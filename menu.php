<?php 
session_start(); 

// Check if the add to cart button is clicked 
if (isset($_POST["add_to_cart"])) { 
	
	// Get the product ID from the form 
	$product_id = $_POST["product_id"]; 
	
	// Get the product quantity from the form 
	$product_quantity = $_POST["product_quantity"]; 

	// Initialize the cart session variable if it does not exist 
	if (!isset($_SESSION["cart"])) { 
		$_SESSION["cart"] = []; 
	} 

	// Check if the quantity is greater than zero
	if ($product_quantity > 0) {
		// Add the product and quantity to the cart 
		$_SESSION["cart"][$product_id] = $product_quantity; 
	}

	header("location:cart.php"); 
} 
?>


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

  <title> Feane </title>

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

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section start -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span><?php
                session_start();
                $user = $_SESSION['user'];
                echo $user['username'];
                ?> u are in menu
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
              <li class="nav-item active">
                <a class="nav-link" href="menu.php">Menu <span class="sr-only">(current)</span> </a>
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
                </svg>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- food section -->

  <section class="food_section layout_padding">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>
            Our Menu
          </h2>
        </div>
  
        <ul class="filters_menu">
          <li class="active" data-filter="*">All</li>
          <li data-filter=".burger">Burger</li>
          <li data-filter=".pizza">Pizza</li>
          <li data-filter=".pasta">Pasta</li>
          <li data-filter=".fries">Fries</li>
        </ul>
  
        <div class="filters-content">
          <div class="row grid">
            <div class="col-sm-6 col-lg-4 all pizza">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="images/f1.png" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Delicious Pizza
                    </h5>
                    <div class="options">
                      <h6>
                        $20
                      </h6>
                      <form method="post" action="menu.php">
                          <input type="hidden" name="product_id" value="1">
                          <label for="product1_quantity"> Quantity: </label>
                          <input type="number" id="product1_quantity" name="product_quantity" value="1" min="1" max="10"/>
                          <button type="submit" name="add_to_cart">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                          </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 all burger">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="images/f2.png" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Delicious Burger
                    </h5>
                    <div class="options">
                      <h6>
                        $15
                      </h6>
                      <form method="post" action="menu.php"> 
                        <input type="hidden" name="product_id" value="2"> 
                        <label for="product2_quantity"> Quantity: </label> 
                        <input type="number" id="product2_quantity" name="product_quantity" value="1" min="1" max="10"/> 
                        <button type="submit" name="add_to_cart">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                        </button>
                      </form> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 all pizza">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="images/f3.png" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Delicious Pizza
                    </h5>
                    <div class="options">
                      <h6>
                        $17
                      </h6>
                      <form method="post" action="menu.php"> 
                        <input type="hidden" name="product_id" value="3"> 
                        <label for="product3_quantity"> Quantity: </label> 
                        <input type="number" id="product3_quantity" name="product_quantity" value="1" min="1" max="10"/> 
                        <button type="submit" name="add_to_cart">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                        </button>
                      </form> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 all pasta">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="images/f4.png" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Delicious Pasta
                    </h5>
                    <div class="options">
                      <h6>
                        $18
                      </h6>
                      <form method="post" action="menu.php"> 
                        <input type="hidden" name="product_id" value="4"> 
                        <label for="product4_quantity"> Quantity: </label> 
                        <input type="number" id="product4_quantity" name="product_quantity" value="1" min="1" max="10"/> 
                        <button type="submit" name="add_to_cart">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                        </button>
                      </form> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 all fries">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="images/f5.png" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      French Fries
                    </h5>
                    <div class="options">
                      <h6>
                        $10
                      </h6>
                      <form method="post" action="menu.php"> 
                        <input type="hidden" name="product_id" value="5"> 
                        <label for="product5_quantity"> Quantity: </label> 
                        <input type="number" id="product5_quantity" name="product_quantity" value="1" min="1" max="10"/> 
                        <button type="submit" name="add_to_cart">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                        </button>
                      </form> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 all pizza">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="images/f6.png" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Delicious Pizza
                    </h5>
                    <div class="options">
                      <h6>
                        $15
                      </h6>
                      <form method="post" action="menu.php"> 
                        <input type="hidden" name="product_id" value="6"> 
                        <label for="product6_quantity"> Quantity: </label> 
                        <input type="number" id="product6_quantity" name="product_quantity" value="1" min="1" max="10"/> 
                        <button type="submit" name="add_to_cart">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                        </button>
                      </form> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 all burger">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="images/f7.png" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Tasty Burger
                    </h5>
                    <div class="options">
                      <h6>
                        $12
                      </h6>
                      <form method="post" action="menu.php"> 
                        <input type="hidden" name="product_id" value="7"> 
                        <label for="product7_quantity"> Quantity: </label> 
                        <input type="number" id="product7_quantity" name="product_quantity" value="1" min="1" max="10"/> 
                        <button type="submit" name="add_to_cart">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                        </button>
                      </form> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 all burger">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="images/f8.png" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Tasty Burger
                    </h5>
                    <div class="options">
                      <h6>
                        $14
                      </h6>
                      <form method="post" action="menu.php"> 
                        <input type="hidden" name="product_id" value="8"> 
                        <label for="product8_quantity"> Quantity: </label> 
                        <input type="number" id="product8_quantity" name="product_quantity" value="1" min="1" max="10"/> 
                        <button type="submit" name="add_to_cart">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                        </button>
                      </form> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 all pasta">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="images/f9.png" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Delicious Pasta
                    </h5>
                    <div class="options">
                      <h6>
                        $10
                      </h6>
                      <form method="post" action="menu.php"> 
                        <input type="hidden" name="product_id" value="9"> 
                        <label for="product9_quantity"> Quantity: </label> 
                        <input type="number" id="product9_quantity" name="product_quantity" value="1" min="1" max="10"/> 
                        <button type="submit" name="add_to_cart">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                        </button>
                      </form> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="btn-box">
        </div>
      </div>
    </section>
  
    <!-- end food section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              Feane
            </a>
            <p>
              Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Everyday
          </p>
          <p>
            10.00 Am -10.00 Pm
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a><br><br>
          &copy; <span id="displayYear"></span> Distributed By
          <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

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