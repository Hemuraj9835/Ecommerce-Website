<?php
include('server/connection.php');

if(isset($_GET['product_id'])){
  $product_id = $_GET['product_id'];

  // Prepared statement to prevent SQL injection
  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
  $stmt->bind_param("i", $product_id);
  $stmt->execute();
  $product = $stmt->get_result();

  // Check if product exists
  if($product->num_rows == 0) {
    // Redirect to index if product does not exist
    header('location: index.php');
    exit();
  }
} else {
  // Redirect to index if no product id is provided
  header('location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f195caf533.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Assets/css/style.css"/>
</head>
<body>

    <!---NAV BAR-->
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

    <!--Single Product-->
    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">
            <?php while($row = $product->fetch_assoc()) { ?>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="Assets/images/<?php echo htmlspecialchars($row['product_image']); ?>" id="mainImg"/>
                <div class="small-img-group">
                    <?php for($i = 1; $i <= 4; $i++) { 
                        if (!empty($row['product_image' . $i])) { ?>
                    <div class="small-img-col">
                        <img src="Assets/images/<?php echo htmlspecialchars($row['product_image' . $i]); ?>" width="100%" class="small-img"/>
                    </div>
                    <?php } } ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <h5><?php echo htmlspecialchars($row['product_category']); ?></h5>
                <h3 class="py-4"><?php echo htmlspecialchars($row['product_name']); ?></h3>
                <h2>Rs.<?php echo htmlspecialchars($row['product_price']); ?></h2>
                <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($row['product_id']); ?>"/>
                    <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($row['product_image']); ?>"/>
                    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($row['product_name']); ?>"/>
                    <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($row['product_price']); ?>"/>  
                    <input type="number" name="product_quantity" value="1"/>
                    <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
                </form>
                <h4 class="mt-5 mb-5"> Product details</h4>
                <span><?php echo nl2br(htmlspecialchars($row['product_description'])); ?></span> 
            </div> 
            <?php } ?>
        </div>
    </section>

    <!--Related Products-->
    <section id="Featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Related Products</h3>
            <hr>
            <p>Latest Technology products</p>
        </div>
        <div class="row mx-auto container-fluid">
            <!-- Repeat this block for each related product -->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="Assets/images/15pro.jpeg"/>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Iphone 15 pro max</h5>
                <h4 class="p-price">Rs 189999</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <!-- Repeat this block ends -->
        </div>
    </section>

    <!--Footer-->
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <img class="logo" src="Assets/images/logo.jpg"/>
                <p class="pt-3">We are known for our Best sale service And on time delivery</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Featured</h5>
                <ul class="text-uppercase">
                    <li><a href="#">SmartPhones</a></li>
                    <li><a href="#">SmartWatch</a></li>
                    <li><a href="#">Earphones</a></li>
                    <li><a href="#">Printers</a></li>
                    <li><a href="#">Laptops</a></li>
                </ul>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Contact Us</h5>
                <div>
                    <h6 class="text-uppercase">Address</h6>
                    <p>56, Prem Nagar Delhi, 400001</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Phone number</h6>
                    <p>0651-247136(Toll Free)</p>
                    <p>9876543210</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>big.mart@bigmart.com</p>
                </div>              
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Popular Brand Collaborations</h5>
                <div class="row">
                    <img src="Assets/images/apple.jpeg" class="img-fluid w-25 h-100 m-2"/>
                    <img src="Assets/images/download.png" class="img-fluid w-25 h-100 m-2"/>
                    <img src="Assets/images/dell lo.jpeg" class="img-fluid w-25 h-100 m-2"/>
                    <img src="Assets/images/brand2.JPG" class="img-fluid w-25 h-100 m-2"/>
                    <img src="Assets/images/download (1).png" class="img-fluid w-25 h-100 m-2"/>
                </div>
            </div>
        </div>
        <div class="Copyright mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <img class="Copyright1" src="Assets/images/payment.png"/>                
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
                    <p>ecommerce @2030 All Right Reserved</p>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        var mainImg = document.getElementById("mainImg");
        var smallImg = document.getElementsByClassName("small-img");
        for(let i = 0; i < smallImg.length; i++) {
            smallImg[i].onclick = function() {
                mainImg.src = smallImg[i].src;
            }
        }
    </script>
</body>
</html>
