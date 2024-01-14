<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
</body>
</html>


<?php

// error_reporting(0);

// including database connection file 

include_once "./includes/connect.php";

// get product function 

function getProducts(){
    global $con;
    // Condition to check isset or not
    if(!isset($_GET['category']) && !isset($_GET['brand'])){
    
    $select_query = "SELECT * FROM products ORDER BY rand() LIMIT 0,9";
    $result_query = mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card card_size'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt=' $product_title'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price. $product_price.TK</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
    </div>
    </div>";
}
}
}

// getting all product display
function get_all_products(){
    global $con;
    // Condition to check isset or not
    if(!isset($_GET['category']) && !isset($_GET['brand'])){
    
    $select_query = "SELECT * FROM products ORDER BY rand()";
    $result_query = mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card card_size'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt=' $product_title'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price. $product_price.TK</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
    </div>
    </div>";
}
}
}


// getting uinque categories
function get_unique_category(){
    global $con;
    // Condition to check isset or not
    if(isset($_GET['category'])){
    $category_id = $_GET['category'];
    $select_query = "SELECT * FROM products WHERE category_id = $category_id";
    $result_query = mysqli_query($con,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No Stock for this category.</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card card_size'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt=' $product_title'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
    </div>
    </div>";
}
}
}

// getting unique brands 
function get_unique_brands(){
    global $con;
    // Condition to check isset or not
    if(isset($_GET['brand'])){
    $brand_id = $_GET['brand'];
    $select_query = "SELECT * FROM products WHERE brand_id = $brand_id";
    $result_query = mysqli_query($con,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>This brand is not available for services now.</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card card_size'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt=' $product_title'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
    </div>
    </div>";
}
}
}

function getbrands(){
    global $con;
    $select_brands = "SELECT * FROM brands";
            $result_brands = mysqli_query($con,$select_brands);
           
            while($row = mysqli_fetch_assoc($result_brands)){
              $brand_title = $row['brand_title'];
              $brand_id ="brand=".$row['brand_id'];
              echo "<li class='nav-item'>
                      <a href='index.php?$brand_id' class='nav-link text-light'>$brand_title</a>
                    </li>";
            }
        }


function getcategorys(){
    global $con;
    $select_categories = "SELECT * FROM categories";
            $result_categories = mysqli_query($con,$select_categories);

            while($row = mysqli_fetch_assoc($result_categories)){
              $category_title = $row['category_title'];
              $category_id ="category=".$row['category_id'];
              echo "<li class='nav-item'>
                      <a href='index.php?$category_id' class='nav-link text-light'>$category_title</a>
                    </li>";
            }
        }


function search_product(){
    global $con;
    // Condition to check isset or not 
    if(isset($_GET['search_data_product'])){
        $user_serach = $_GET['search_data']; 

    $search_query = "SELECT * FROM products WHERE product_keywords LIKE '%$user_serach%'";
    $result_query = mysqli_query($con,$search_query);
    $num_rows = mysqli_num_rows($result_query);
        if($num_rows ==0){
            echo "<h2 class='text-center text-danger'>No Results match. No Products found on this Category!</h2>";
        }
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card card_size'>
    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt=' $product_title'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
    </div>
    </div>";
}
}
}

// related product see this function and veiw details
function view_details(){
    global $con;
    // Condition to check isset or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category']) && !isset($_GET['brand'])){
        $product_id  = $_GET['product_id'];
    
    $select_query = "SELECT * FROM products WHERE product_id=$product_id";
    $result_query = mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    echo "<div class='row'>
    <div class='col-md-4'>
        <div class='card card_size'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt=' $product_title'>
            <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price. $product_price.TK</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
            <a href='index.php' class='btn btn-secondary'>Go Home</a>
            </div>
        </div>
    </div>
        <div class='col-md-8'>
            <!-- related image -->
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'>Related Products</h4>
                </div>
                    <div class='col-md-6'>
                        <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt=' $product_title'>
                    </div>

                    <div class='col-md-6'>
                        <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt=' $product_title'>
                    </div>
                
            </div>

        </div>

    </div>";
}
}
}
}

//  get ip address function 
function getIPAddress(){  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  


// add to cart function 
function addCart(){
    if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    $select_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_address' AND product_id='$get_product_id'";
    $result_query = mysqli_query($con,$select_query);
    $numRows = mysqli_num_rows($result_query);
    if($numRows>0){
        echo "<script>alert('This item is already persent inside cart.')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else{
        $insert_query = "INSERT INTO cart_details(product_id,ip_address,quantity) VALUES ('$get_product_id','$get_ip_address',0)";
        $result_query = mysqli_query($con,$insert_query);
        echo "<script>alert('Item is added to cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
}

// function to get cart item count numbers

function addCart_items(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($con,$select_query);
        $count_cart_item = mysqli_num_rows($result_query);
    }
    else{
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($con,$select_query);
        $count_cart_item = mysqli_num_rows($result_query);
    }
    echo $count_cart_item;
}

// total cart price function 

function total_cart_price(){
    global $con;
    $total_price =0;
    $get_ip_add = getIPAddress();
    $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
    $result = mysqli_query($con,$cart_query);
    while($row = mysqli_fetch_array($result)){
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM products WHERE product_id='$product_id'";
        $result_products = mysqli_query($con,$select_products);
        while($row_product_price = mysqli_fetch_array($result_products)){
            $product_price = array($row_product_price['product_price']); // [200,300]
            $product_value = array_sum($product_price); // [500]
            $total_price+=$product_value; // [500]
        }
    }
    echo $total_price;
}


// get user order details

function get_user_order_details(){
    global $con;
    $user_name = $_SESSION['username'];
    $get_details = "SELECT * FROM user_table WHERE user_name='$user_name'";
    $result_query = mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id = $row_query['user_id'];
        if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
            if(!isset($_GET['delete_account'])){
                $get_orders = "SELECT * FROM user_orders WHERE user_id='$user_id' AND order_status='pending'";
                $result_order_query = mysqli_query($con,$get_orders);
                $row_count = mysqli_num_rows($result_order_query);
                if($row_count>0){
                    echo "<h3 class='text-center text-success my-5 mb-2'>You have <span class='text-danger'>$row_count </span>pending orders</h3>
                    <p class='text-center' style='text-decration:none;'><a href='profile.php?my_orders' class='text-dark'>Order Details </a></p>";
                }
                else{
                        echo "<h3 class='text-center text-success my-5 mb-2'>You have <span class='text-danger'>$row_count </span>pending orders</h3>
                        <p class='text-center' style='text-decration:none;'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
                }
            }
        }
    }
}
}

?>