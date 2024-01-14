<!-- Connect the database -->
<?php
require_once "includes/connect.php";
require_once "functions/common_function.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website using PHP & MySQL...</title>
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- inner Stylesheet -->
    <style>
      body{
        overflow-x: hidden;
      }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><span style="color: white; font-size: 20px;"><b>Hater</b></span> Nagale</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>

          <?php 
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
          </li>";
          }
          else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./user_area/profile.php'>My Account</a>
          </li>";
          }
          ?>

        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-plus"><sup style="color:white"><?php addCart_items();?></sup></i></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>.TK</a>
        </li>
          
      </ul>

      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>

    </div>
  </div>
</nav>


<!-- second child navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      <!-- php server dynamic code -->
      <?php
      error_reporting(0);
      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest </a>
    </li>";
      }
      else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcom ".$_SESSION['username']."</a>
    </li>";
      }

    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link' href='user_area/user_login.php'>LogIn</a>
    </li>";
    }
  else{
     echo "<li class='nav-item'>
      <a class='nav-link' href='user_area/logout.php'>Logout</a>
  </li>";
    }
      ?>
    
    </ul>
</nav>


<!-- calling add to cart function -->
<?php
addCart();
?>





<!-- third child body type -->
<div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communications is at the heart of e-commerce and commounity.</p>
</div>

<!-- fourth child -->
<div class="row">

     <!-- slide navbar -->
    <div class="col-md-2 bg-secondary p-0">
       
        <!-- brand -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="" class="nav-link text-light"><h4>Brands</h4></a>
            </li>

            <!-- server code show the  Brand Name -->
            <?php
            // brand columns name show on commoun function page 
            getbrands();
            
            ?>

        </ul>

        <!-- catagories -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="" class="nav-link text-light"><h4>Catagories</h4></a>
            </li>

            <!-- server code show the  Brand Name -->
            <?php
            // Category columns name show on commoun function page 
            getcategorys();
            
            
            ?>
        </ul>

    </div>
    <!-- Display the right side product info -->
    
    <div class="col-md-10">
        <!-- Display the Products products  -->
        <div class="row">
          <!-- server code for index page product show -->
          <?php
          // product display function call on common function page
          getProducts();
          get_unique_category();
          get_unique_brands();
          search_product();


          // ip address function
          // $ip = getIPAddress();  
          // echo 'User Real IP Address - '.$ip; 
          ?>
        </div>
    </div>
</div>




<!-- last child  footer-->
<!-- include footer -->
<?php include_once "./includes/footer.php";?>

</div>
 

<!-- Bootstrap javascript link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>