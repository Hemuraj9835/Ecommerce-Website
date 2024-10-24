<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f195caf533.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Assets/css/style.css"/>

    <style>
        .product img{
            width:15rem;
            height:15rem;
            box-sizing: border-box;
            object-fit: cover;
        }
    </style>


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

   <!--Featured-->
   <section id="Featured" class="my-5 py-5">
    <div class="container text-center mt-5 py-5">
      <h3 >Our Featured Products</h3>
      <hr>
      <p> Latest Technology & Handpicked products just for You.. </p>
    </div>
    <div class="row p-0 m-0">
        <div class="row mx-auto container-fluid">
            <?php include('server/featured_product.php'); ?>
            <?php while($row= $featured_products->fetch_assoc()){ ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="Assets/images/<?php echo $row['product_image']; ?>"/>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price">Rs.<?php echo $row['product_price']; ?></h4>
                    <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
    
      


   <!--Phones-->
   <section id="Featured" class="my-5 ">
    <div class="container text-center mt-5 py-5">
      <h3 >Latest SmartPhones</h3>
      <hr>
      <p>For Flawless Gaming & super speed 5g with Good Battery backup</p>
    </div>
    <div class="row p-0 m-0">
        <div class="row mx-auto container-fluid">
            <?php include('server/shopphone.php'); ?>
            <?php while($smartphone_products1->fetch_assoc()){ ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="Assets/images/<?php echo $row['product_image']; ?>"/>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price">Rs.<?php echo $row['product_price']; ?></h4>
                    <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
    
      <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/fold.jpeg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">OnePlus Fold</h5>
        <h4 class="p-price">Rs 129999</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/24.jpeg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Samsung S24 Ultra</h5>
        <h4 class="p-price">Rs 99999</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/x100.jpeg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Vivo X100</h5>
        <h4 class="p-price">Rs 69999</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class="row mx-auto container-fluid" >
        <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/pixel.avif"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Google Pixel 7Pro</h5>
          <h4 class="p-price">Rs 79999</h4>
          <button class="buy-btn">Buy Now</button>
  
        </div>
      
        <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/nothing.jpeg"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Nothing Phone 2</h5>
          <h4 class="p-price">Rs 49999</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
  
        <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/redmi.jpeg"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Redmi note 13pro</h5>
          <h4 class="p-price">Rs 17999</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
  
        <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/moto.jpg"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Motorola Edge40</h5>
          <h4 class="p-price">Rs 22999</h4>
          <button class="buy-btn">Buy Now</button>
        </div>

        
            <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3 " src="Assets/images/fold1.jpeg"/>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h5 class="p-name">Samsung Fold</h5>
              <h4 class="p-price">Rs 119999</h4>
              <button class="buy-btn">Buy Now</button>
      
            </div>
          
            <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3 " src="Assets/images/mi 12.jpeg"/>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h5 class="p-name">MI 12 5g</h5>
              <h4 class="p-price">Rs 39999</h4>
              <button class="buy-btn">Buy Now</button>
            </div>
      
            <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3 " src="Assets/images/v29.avif"/>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h5 class="p-name">Vivo v29</h5>
              <h4 class="p-price">Rs 59999</h4>
              <button class="buy-btn">Buy Now</button>
            </div>
      
            <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3 " src="Assets/images/oneplus12.jpeg"/>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h5 class="p-name">oneplus 12</h5>
              <h4 class="p-price">Rs 69999</h4>
              <button class="buy-btn">Buy Now</button>
            </div>



      </div>

   </section>

   <!--Laptop-->
   <section id="Featured" class="my-5 ">
    <div class="container text-center mt-5 py-5">
      <h3 >Latest Laptop</h3>
      <hr>
      <p> Gaming Laptops & Great Processor with Good Battery backup</p>
    </div>
    <div class="row mx-auto container-fluid" >
      <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/dell xps.jpeg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Dell Xps</h5>
        <h4 class="p-price">Rs 78999</h4>
        <button class="buy-btn">Buy Now</button>

      </div>
    
      <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/hp cnet.jpeg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Hp CNET</h5>
        <h4 class="p-price">Rs 129999</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/asus tuf.jpeg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Asus TUF Gaming</h5>
        <h4 class="p-price">Rs 99999</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/lenevo AI.jpeg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Lenevo AI</h5>
        <h4 class="p-price">Rs 69999</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class="row mx-auto container-fluid" >
        <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/Delll vastro.avif"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Dell Vostro</h5>
          <h4 class="p-price">Rs 68999</h4>
          <button class="buy-btn">Buy Now</button>
  
        </div>
      
        <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/Dell 3675.jpeg"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Dell 3675</h5>
          <h4 class="p-price">Rs 89999</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
  
        <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/lenevo think book.avif"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Lenevo Think Book</h5>
          <h4 class="p-price">Rs 79999</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
  
        <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/mi notebook.jpg"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Mi notebook</h5>
          <h4 class="p-price">Rs 69999</h4>
          <button class="buy-btn">Buy Now</button>
        </div>


      </div>

   </section>
   <!--Watch-->
   <section id="Featured" class="my-5 ">
    <div class="container text-center mt-5 py-5">
      <h3 > SmartWatch</h3>
      <hr>
      <p> Latest & Branded SmartWatch </p>
    </div>
    <div class="row mx-auto container-fluid" >
      <div class=" product2 text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/watch1.jpeg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">iWatch </h5>
        <h4 class="p-price">Rs 58999</h4>
        <button class="buy-btn">Buy Now</button>

      </div>
    
      <div class=" product2 text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/watch2.avif"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Samsung Watch 6</h5>
        <h4 class="p-price">Rs 49999</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class=" product4 text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/OnePlus-Watch-1-1024x600.jpg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">OnePlus Watch 1</h5>
        <h4 class="p-price">Rs 29999</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class=" product3 text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/watch4.jpg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">NOise Watch2</h5>
        <h4 class="p-price">Rs 8999</h4>
        <button class="buy-btn">Buy Now</button>
      </div>
      </div>
   </section>
   
   <!--Audio-->
   <section id="Featured" class="my-5 ">
    <div class="container text-center mt-5 py-5">
      <h3 >Earphone & Headphone </h3>
      <hr>
      <p> Handpicked Earphone JUst For You...</p>
    </div>
    <div class="row mx-auto container-fluid" >
      <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/audio1.jpeg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Bluetooth Earphones</h5>
        <h4 class="p-price">Rs 5999</h4>
        <button class="buy-btn">Buy Now</button>

      </div>
    
      <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/audio2.jpg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Wired Earphones</h5>
        <h4 class="p-price">Rs 599</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/audio3.jpeg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Bluetooth Speaker</h5>
        <h4 class="p-price">Rs 1999</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3 " src="Assets/images/audio4.jpeg"/>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Wireless Headphones</h5>
        <h4 class="p-price">Rs 3999</h4>
        <button class="buy-btn">Buy Now</button>
      </div>

      <div class="row mx-auto container-fluid" >
        <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/mi earphone.jpg"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Mi Earphone</h5>
          <h4 class="p-price">Rs 2999</h4>
          <button class="buy-btn">Buy Now</button>
  
        </div>
      
        <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/oppo.jpg"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">OppO Airpods</h5>
          <h4 class="p-price">Rs 2999</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
  
        <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/boat rokzer.jpg"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Boat Buds</h5>
          <h4 class="p-price">Rs 1599</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
  
        <div class=" product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/jbl airpodes.jpg"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Jbl Buds</h5>
          <h4 class="p-price">Rs 2999</h4>
          <button class="buy-btn">Buy Now</button>
        </div>


      </div>

   </section>

    <!--Printer-->
    <section id="Featured" class="my-5 ">
      <div class="container text-center mt-5 py-5">
        <h3 > Printer</h3>
        <hr>
        <p> Best Hand picked Printers  </p>
      </div>
      <div class="row mx-auto container-fluid" >
        <div class=" product2 text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/printer1.avif"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Hp Printer </h5>
          <h4 class="p-price">Rs 19999</h4>
          <button class="buy-btn">Buy Now</button>

        </div>
      
        <div class=" product2 text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/printer2.jpg"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Epson Printer</h5>
          <h4 class="p-price">Rs 15999</h4>
          <button class="buy-btn">Buy Now</button>
        </div>

        <div class=" product4 text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/printer3.png"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Canon Printer</h5>
          <h4 class="p-price">Rs 17999</h4>
          <button class="buy-btn">Buy Now</button>
        </div>

        <div class=" product3 text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3 " src="Assets/images/printerr4.jpg"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Hp Home Printer</h5>
          <h4 class="p-price">Rs 18999</h4>
          <button class="buy-btn">Buy Now</button>
        </div>

        <div class="row mx-auto container-fluid" >
            <div class=" product2 text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3 " src="Assets/images/hp tank.avif"/>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h5 class="p-name">Hp Tank Printer </h5>
              <h4 class="p-price">Rs 16999</h4>
              <button class="buy-btn">Buy Now</button>
    
            </div>
          
            <div class=" product2 text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3 " src="Assets/images/hp laser jet3.avif"/>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h5 class="p-name">Hp laser Jetr</h5>
              <h4 class="p-price">Rs 15999</h4>
              <button class="buy-btn">Buy Now</button>
            </div>
    
            <div class=" product4 text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3 " src="Assets/images/hp Xerox.jpg"/>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h5 class="p-name">Hp Xerox Printer</h5>
              <h4 class="p-price">Rs 17999</h4>
              <button class="buy-btn">Buy Now</button>
            </div>
    
            <div class=" product3 text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3 " src="Assets/images/color-xerox-machine.jpg"/>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h5 class="p-name"> Xerox Machine</h5>
              <h4 class="p-price">Rs 49999</h4>
              <button class="buy-btn">Buy Now</button>
            </div>


        </div>
    



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