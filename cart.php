<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    // If user has already added a product to cart
    if (isset($_SESSION['cart'])) {
        $products_array_ids = array_column($_SESSION['cart'], "product_id");

        // If product has already been added to cart or not
        if (!in_array($_POST['product_id'], $products_array_ids)) {

            $product_id = $_POST['product_id'];


            $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity']
            );

            $_SESSION['cart'][$_POST['product_id']] = $product_array;
        } else {
            echo '<script>alert("Product is already in cart");</script>';
            // echo '<script>window.location="index.php";</script>';
        }
    } else {
        // If this is the first product
        $product_array = array(
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_image' => $_POST['product_image'],
            'product_quantity' => $_POST['product_quantity']
        );

        $_SESSION['cart'][$_POST['product_id']] = $product_array;
    }
} elseif (isset($_POST['remove_product'])) {
    if (isset($_SESSION['cart'][$_POST['product_id']])) {
        unset($_SESSION['cart'][$_POST['product_id']]);
    }
} elseif (isset($_POST['update_quantity'])) {
    if (isset($_SESSION['cart'][$_POST['product_id']])) {
        $_SESSION['cart'][$_POST['product_id']]['product_quantity'] = $_POST['product_quantity'];
    }
} else {
    header('location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f195caf533.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Assets/css/style.css"/>
</head>
<body>

<!-- NAV BAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-white fixed-top py-3">
    <div class="container">
        <img class="logo" src="Assets/images/logo.jpg"/>
        <h2 class="brand">Big Mart</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="Index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.html">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Basket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <i class="fa-thin fa-cart-shopping"></i>
                </li>
                <li class="nav-item">
                    <i class="fa-solid fa-user"></i>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Cart -->
<section class="cart container my-5 py-5">
    <div class="container mt-5">
        <h2 class="font-weight-bold">Your Basket</h2>
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>

        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <?php foreach ($_SESSION['cart'] as $key => $value): ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="Assets/images/<?php echo htmlspecialchars($value['product_image']); ?>"/>
                            <div>
                                <p><?php echo htmlspecialchars($value['product_name']); ?></p>
                                <small><span>Rs.</span><?php echo htmlspecialchars($value['product_price']); ?></small>
                                <br>
                                <form method="POST" action="cart.php">
                                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($value['product_id']); ?>"/>
                                    <input type="submit" name="remove_product" class="remove-btn" value="Remove"/>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <form method="POST" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($value['product_id']); ?>"/>
                            <input type="number" name="product_quantity" value="<?php echo htmlspecialchars($value['product_quantity']); ?>" min="1"/>
                            <input type="submit" name="update_quantity" class="edit-btn" value="Edit"/>
                        </form>
                    </td>
                    <td>
                        <span>Rs.</span><?php echo htmlspecialchars($value['product_price'] * $value['product_quantity']); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">Your cart is empty.</td>
            </tr>
        <?php endif; ?>
    </table>

    <div class="CheckOut-container">
        <form method="POST" action="checkout.php">
        <input type="submit" class="btn checkout-btn" value="checkout" name="checkout">
        </form>
    </div>
</section>

<!-- Footer -->
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
                <p>0651-247136 (Toll Free)</p>
                <p>9876543210</p>
            </div>
            <div>
                <h6 class="text-uppercase">Email</h6>
                <p>big.mart@bigmart.com</p>
            </div>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Popular Brand Collaboration</h5>
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
</body>
</html>