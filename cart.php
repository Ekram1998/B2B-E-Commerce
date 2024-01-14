<!-- Connect the database -->
<?php

require_once "includes/connect.php";
require_once "functions/common_function.php";
session_start();
?>

<style>
  .cart_img{
    width: 100px;
    height: 80px;
    object-fit: contain;
  }
</style>
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
    <a class="navbar-brand" href="#"><span style="color: white; font-size: 20px;">Hater</span> Nagale</a>
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
        <a class='nav-link' href='#'>Welcome Guest</a>
    </li>";
      }
      else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcom".$_SESSION['username']."</a>
    </li>";
      }

    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link' href='user_area/user_login.php'>LogIn</a>
  </li>";
    }
  else{
     echo "<li class='nav-item'>
      <a class='nav-link' href='../user_area/user_logout.php'>LogOut</a>
  </li>";
    }
      ?>
    
    </ul>
</nav>



<!-- third child body type -->
<div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communications is at the heart of e-commerce and commounity.</p>
</div>

<!-- fourth child table body type -->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            
              <!-- php code to display dynamic data -->
              <?php

              $get_ip_add = getIPAddress();
              $total_price =0;
              $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
              $result = mysqli_query($con,$cart_query);
              $result_count = mysqli_num_rows($result);
              if($result_count){
                echo "<thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity Select</th>
                    <th>Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
            </thead>
            <tbody>";

            
              while($row = mysqli_fetch_array($result)){
                  $product_id = $row['product_id'];
                  $select_products = "SELECT * FROM products WHERE product_id='$product_id'";
                  $result_products = mysqli_query($con,$select_products);
                  while($row_product_price = mysqli_fetch_array($result_products)){
                      $product_price = array($row_product_price['product_price']); // [200,300]
                      $price_table = $row_product_price['product_price'];
                      $product_title = $row_product_price['product_title'];
                      $product_image1 = $row_product_price['product_image1'];
                      $product_value = array_sum($product_price); // [200+300]
                      $total_price+=$product_value; // [500]
                  
              ?>


              <tr>
                <td><?php echo $product_title;?></td>
                <td><img src="./admin_area/product_images/<?php echo $product_image1;?>" alt="logo" srcset="" class="cart_img"></td>

                <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                <!-- quentity server code  -->
                <?php
                $get_ip_add = getIPAddress();
                if(isset($_POST['cart_update'])){
                  $quantities = $_POST['qty'];
                  $update_cart = "UPDATE cart_details SET quantity=$quantities WHERE ip_address='$get_ip_add'";
                  $result_products_cart = mysqli_query($con,$update_cart);
                  $total_price=$total_price*$quantities;
                  $sub_total_p = $total_price + $total_price;
                }
                ?>

                <!-- end quentity server code  -->
                <td><?php echo $price_table;?>.TK</td>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id;?>"></td>

                <td>
                  <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                  <input type="submit" value="Cart Update" name="cart_update" class="bg-info px-3 py-2 border-0 mx-3">
                  <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                  <input type="submit" value="Remove Cart" name="remove_cart" class="bg-info px-3 py-2 border-0 mx-3">
                </td>
              </tr>

              <?php
              }
            }
          }
          else{
            echo "<h2 class='text-center text-danger'>Cart is Empty.</h2>";
          }
              ?>

            </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-3"> 
          <h4 class="px-3">Subtotal : <strong class="text-info"><?php echo $total_price;?>.TK</strong> </h4>
          <button class="bg-info px-3 py-2 border-0 mx-3"><a href="index.php" class="text-light">Continue Shopping</a></button>
          <button class="bg-secondary px-3 py-2 border-0 mx-3"><a href="user_area/checkout.php" class="text-light text-decoration-none">Check Out</a></button>
        </div>
    </div>
</div>
</form>


<!-- last child  footer-->
<!-- include footer -->
<?php include_once "./includes/footer.php";?>
</div>


<!-- start function to remove items -->
<?php
                function remove_cart_item(){
                  global $con;
                  if(isset($_POST['remove_cart'])){
                    foreach($_POST['removeitem'] as $remove_id){
                      echo $remove_id;
                      $delete_query = "DELETE FROM cart_details WHERE product_id=$remove_id";
                      $run_delete = mysqli_query($con,$delete_query);
                      if($run_delete){
                        echo "<script>window.open('cart.php','_self');</script>";
                      }
                    }
                  }
                }
                echo $remove_item = remove_cart_item();
                ?>
                <!-- end function to remove items -->

 

<!-- Bootstrap javascript link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>