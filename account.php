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
<nav class="navbar navbar-expand-lg bg-body-tertiary  bg-white fixed-top py-3">
    <div class="container">
      <img  class="logo" src="Assets/images/logo.jpg"/>
      <h2 class="brand" >Big Mart</h2>
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


  <!--Account-->
  <section class="my-5 py-5">
  <div class="row container mx-auto">
    <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12"
    <h3 class="font-weight-bold">Account info</h3>
    <hr class="mx-auto">
    <div class="account-info">
        <p>Name-<span> Raju</span></p>
        <p>Email-<span>raju0258@gmail.com</span></p>
        <p>Phone-no.<span>9876543210</span></p>
        <p><a href="" id="order-btn">Your Orders</a></p>
        <p><a href="" id="logout-btn">LogOut</a></p>
    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">
        <form id="account-form">
            <h3>Change Password</h3>
            <hr class="mx-auto">
            <div class="form-group">
                <label>Password</label>
                <input type="Password" class="form-control" id="account-password" name="password" placeholder="Password" required/>
            </div>
            <div class="form-group">
                <label>Confirm-Password</label>
                <input type="Password" class="form-control" id="account-password" name=Confirm-password" placeholder="Confirm-Password" required/>
            </div>
            <div class="form-group">
                <input type="submit" value="Change Password" class="btn" id="change-pass-btn">
            </div>
        </form>
    </div>

  </div>
  </section>

<!--Orders-->
<section class="order container my-2 py-1">
  <div class="container mt-5">
  <h2 class="font-weight-bolde text-center ">Your Orders</h2>
  <hr class="mx-auto">
</div>
<table class=" mt-5 pt-5">
  <tr>
      <th>Product</th>
      <th>Date</th>     
  </tr>
  <tr>
      <td>
          <div class="product-info">
            <img src="Assets/images/hp tank.avif"/>
            <div>
              <p class="mt-3">Hp Tank</p>
            </div>
          </div>

      </td>
      <td>
        <span> 10-06-2024</span>

      </td>
      
  </tr>
  
 
</table>
</section>







  <!--Footer-->
<footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <img class="logo" src="Assets/images/logo.jpg"/>
        <p class="pt-3"> We are known for our Best sale service And on time delivery</p>
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
          <p>56, Prem Nagar Delhi,400001 </p>
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
        <h5 class="pb-2">Popular Brand colabration</h5>
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