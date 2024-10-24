<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/f195caf533.js" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="Assets/css/style.css"/>
</head>
<body>

<?php session_start(); // Start session for managing login status ?>

<!---NAV BAR-->
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-white fixed-top py-3">
    <div class="container">
        <!-- Logo and Brand Name -->
        <img class="logo" src="Assets/images/logo.jpg" alt="Big Mart Logo"/>
        <h2 class="brand">Big Mart</h2>

        <!-- Responsive Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar -->
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Home Link -->
                <li class="nav-item">
                    <a class="nav-link" href="Home.php">Home</a>
                </li>
                <!-- Shop Link -->
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <!-- Basket Link -->
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Basket</a>
                </li>

                <!-- Conditional Rendering for Login and Logout -->
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <!-- Show Logout Button -->
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <!-- Account Icon -->
                    <li class="nav-item">
                        <a href="account.php" class="nav-link"><i class="fa-solid fa-user"></i></a>
                    </li>
                <?php else: ?>
                    <!-- Show Login Button -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Home Section -->
<section id="home" class="mt-5 pt-5">
    <div class="container">
        <h5>NEW ARRIVALS</h5>
        <h1><span>Best offer</span> For season</h1>
        <p>Eshop offers the best products</p>
        <button class="btn btn-primary">Shop Now</button>
    </div>
</section>

<!-- Brand Section -->
<section id="brand" class="container">
    <div class="row">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="Assets/images/apple.jpeg" alt="Apple"/>
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="Assets/images/samsung.png" alt="Samsung"/>
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="Assets/images/download.png" alt="Download"/>
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="Assets/images/Realme_logo.svg.png" alt="Realme"/>
    </div>
</section>

<!-- New Arrivals Section -->
<section id="new" class="w-100">
    <div class="row p-0 m-0">
        <!-- Latest Phones -->
        <div class="col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="Assets/images/images.jpeg" alt="Latest Phones"/>
            <div class="details">
                <h2>Latest Phones</h2>
                <button class="btn btn-primary text-uppercase">Shop Now</button>
            </div>
        </div>
        <!-- Back Cover & Screen Guard -->
        <div class="col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="Assets/images/cover.jpeg" alt="Back Cover & Screen Guard"/>
            <div class="details">
                <h2>Back cover & Screen Guard</h2>
                <button class="btn btn-primary text-uppercase">Shop Now</button>
            </div>
        </div>
        <!-- Earphones -->
        <div class="col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="Assets/images/earphone.jpeg" alt="Earphones"/>
            <div class="details">
                <h2>Awesome Earphones</h2>
                <button class="btn btn-primary text-uppercase">Shop Now</button>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Our Featured</h3>
        <hr>
        <p>Latest Technology products</p>
    </div>
    <div class="row p-0 m-0">
        <div class="row mx-auto container-fluid">
            <?php include('server/featured_product.php'); ?>
            <?php while($row= $featured_products->fetch_assoc()): ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="Assets/images/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>"/>
                    <div class="star">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price">Rs.<?php echo $row['product_price']; ?></h4>
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<!-- Banner Section -->
<section id="banner" class="my-5">
    <div class="container">
        <h4>SALE SALE SALE</h4>
        <h1>End Of Summer Sale <br> Upto 50% OFF</h1>
        <button class="btn btn-primary text-uppercase">Shop Now</button>
    </div>
</section>

<!-- Latest Smartphones Section -->
<section id="latest-smartphones" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Latest Smartphones</h3>
        <hr>
        <p>For Flawless Gaming & super speed 5g with Good Battery backup</p>
    </div>
    <div class="row mx-auto container-fluid">
        <?php include('server/latest_smartphone.php'); ?>
        <?php while($row=$smartphone_products->fetch_assoc()): ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="Assets/images/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>"/>
                <div class="star">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price">Rs.<?php echo $row['product_price']; ?></h4>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- Latest Laptops Section -->
<section id="latest-laptops" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Latest Laptops</h3>
        <hr>
        <p>Gaming Laptops & Great Processor with Good Battery backup</p>
    </div>
    <div class="container">
        <div class="row">
            <?php include('server/laptop.php'); ?>
            <?php while($row = $laptop1->fetch_assoc()): ?>
                <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
                    <div class="product1 text-center">
                        <img class="img-fluid mb-3" src="Assets/images/<?php echo htmlspecialchars($row['product_image']); ?>" alt="Laptop Image"/>
                        <div class="star">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <h5 class="p-name"><?php echo htmlspecialchars($row['product_name']); ?></h5>
                        <h4 class="p-price">Rs.<?php echo htmlspecialchars($row['product_price']); ?></h4>
                        <a href="single_product.php?product_id=<?php echo htmlspecialchars($row['product_id']); ?>"><button class="buy-btn">Buy Now</button></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo" src="Assets/images/logo.jpg" alt="Big Mart Logo"/>
            <p class="pt-3">We provide the best products with the best offers</p>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Featured</h5>
            <ul class="list-unstyled text-uppercase">
                <li><a href="#">Phones</a></li>
                <li><a href="#">Laptops</a></li>
                <li><a href="#">Accessories</a></li>
            </ul>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Contact Us</h5>
            <div>
                <h6 class="text-uppercase">Address</h6>
                <p>123 Street Name, City, India</p>
            </div>
            <div>
                <h6 class="text-uppercase">Phone</h6>
                <p>+91 123 456 7890</p>
            </div>
            <div>
                <h6 class="text-uppercase">Email</h6>
                <p>info@bigmart.com</p>
            </div>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Social Media</h5>
            <div class="social-media">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>