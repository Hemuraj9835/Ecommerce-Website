<?php
include('server/connection.php');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $phone_number = $_POST['Phone_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['Confirm-password'];
    
    // If password did not match
    if ($password !== $confirmpassword) {
        header('Location: registration.php?error=Passwords do not match');
        exit();
    }

    // If password is less than 6 characters
    if (strlen($password) < 6) {
        header('Location: registration.php?error=Password must be at least 6 characters');
        exit();
    }

    // Check whether there is a user with this email
    $stmt1 = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_email = ?");
    $stmt1->bind_param('s', $email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->fetch();
    $stmt1->close();

    // If there is a user already registered with this email
    if ($num_rows != 0) {
        header('Location: registration.php?error=User with this email already exists');
        exit();
    } else {
        // Create a new user
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password, user_Phone_no) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $name, $email, $hashed_password, $phone_number);

        // If account was created successfully
        if ($stmt->execute()) {
            session_start();
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $name;
            $_SESSION['logged_in'] = true;
            header('Location: login.php?register=You have been registered successfully');
        } else {
            header('Location: registration.php?error=Could not create an account at this moment');
        }
        $stmt->close();
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

<!-- Register -->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Registration Form</h2>
        <hr class="mx-auto">        
    </div>

    <form id="register-form" method="POST" action="registration.php">
        <p style="color: red;"><?php if (isset($_GET['error'])) { echo $_GET['error']; } ?></p>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required/>
        </div>       
        
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" id="register-Phone-no" name="Phone_no" placeholder="Phone-no" required/>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" id="register-email" name="email" placeholder="Email" required/>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required/>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" id="register-confirm-password" name="Confirm-password" placeholder="Confirm Password" required/>
        </div>
        <div class="form-group">               
            <input type="submit" class="btn" id="register-btn" name="register" value="Register"/>
        </div>
        <div class="form-group">               
            <a id="login-url" href="login.php" class="btn">Do you have an account? Login</a>
        </div>
    </form>
</section>

<!-- Footer -->
<footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo" src="Assets/images/logo.jpg"/>
            <p class="pt-3">We are known for our Best sale service and on-time delivery</p>
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
