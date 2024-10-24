<?php
session_start();
include('server/connection.php');

// If the user is already logged in, redirect them to the home page
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: Home.php');
    exit();
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the query
    if ($stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email = ? LIMIT 1")) {
        $stmt->bind_param('s', $email);

        if ($stmt->execute()) {
            $stmt->bind_result($user_id, $user_name, $user_email, $user_password);
            $stmt->store_result();

            // Check if the user exists
            if ($stmt->num_rows == 1) {
                $stmt->fetch();

                // Verify the password
                if (password_verify($password, $user_password)) {
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['user_email'] = $user_email;
                    $_SESSION['logged_in'] = true;

                    header('Location: Home.php?message=logged in successfully');
                    exit();
                } else {
                    header('Location: login.php?error=Invalid password');
                    exit();
                }
            } else {
                header('Location: login.php?error=No user found with this email');
                exit();
            }
        } else {
            header('Location: login.php?error=Something went wrong');
            exit();
        }

        $stmt->close(); // Close the statement
    } else {
        header('Location: login.php?error=Failed to prepare the statement');
        exit();
    }
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

<!--Login-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="font-weight-bold">Login</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="login-form" method="POST" action="login.php">
            <p style="color: red" class="text-center"><?php if (isset($_GET['error'])) { echo $_GET['error']; } ?></p>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="login-email" name="email" placeholder="Email" required/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required/>
            </div>
            <div class="form-group">               
                <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login"/>
               
            </div>
            <div class="form-group">               
               <a id="register-url" href="registration.php" class="btn"> Don't have an account? Register</a>
            </div>
        </form>
    </div>
</section>

<!--Footer-->
<footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo" src="Assets/images/logo.jpg"/>
            <p class="pt-3"> We are known for our best sale service and on-time delivery</p>
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
                <p>56, Prem Nagar, Delhi, 400001</p>
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
</body>
</html>