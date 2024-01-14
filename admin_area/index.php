<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])){
    header('location: admin_login.php');
}

include_once "../includes/connect.php";
include_once "../functions/common_function.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  -->
    <title>Admin Dash Board</title>
     <!-- css link -->
     <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Internal Css -->
<style>
body{
overflow-x: hidden;
}
.admin_image{
   width: 70px;
   height: 70px;
   object-fit: contain; 
}
.product_image{
    width: 80px;
    object-fit: contain;
}
</style>
</head>
<body>
    <!-- navbar  -->

    <!-- first chaild navbar -->

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container--fluid d-flex px-3">
                <img src="../images/logo-social.png" alt="logo" srcset="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                    <?php
      error_reporting(0);
      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
    </li>";
      }
      else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcom ".$_SESSION['username']."</a>
    </li>";
      }

      ?>
                    </ul>
                </nav>      
            </div>
        </nav>
    

    <!-- second chile detail -->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <!-- thired chilad -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex aline-items-center">
            <div>
                <a href="#" class="px-3"><img src="../images/ekram.jpg" alt="logo" class="admin_image"></a>
                <p class="text-light text-center px-3"><?php echo $_SESSION['username']; ?></p>
            </div>
            <!-- for button -->
            <div class="button text-center px-3 mt-3">
                <button><a href="index.php?insert_product" class="nav-link text-light bg-info my-1  p-1">Insert Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1 p-1">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 p-1">Insert Categories</a></button>
                <button><a href="index.php?view_category" class="nav-link text-light bg-info my-1 p-1">View Categories</a></button>
                <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1 p-1">Insert Brands</a></button>
                <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1 p-1">View Brands</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1 p-1">All Orders</a></button>
                <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1 p-1">All Payments</a></button>
                <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1 p-1">List Users</a></button>
                <button><a href="admin_logout.php" class="nav-link text-light bg-info my-1 p-1">Log Out</a></button>
            </div>
        </div>
    </div>

    <!-- fourth chail using PHP code -->
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_product'])){
            include('insert_product.php');
        } 
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }

        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['view_category'])){
            include('view_categories.php');
        }
        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['edit_brand'])){
            include('edit_brand.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['delete_brand'])){
            include('delete_brand.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['list_payments'])){
            include('list_payments.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        ?>       
    </div>

<?php
include_once "../includes/footer.php";
?>
</div>


<!-- Bootstrap javascript link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>



<!-- if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link' href='user_login.php'>LogIn</a>
  </li>";
    }
  else{
     echo "<li class='nav-item'>
     <a class='nav-link' href='logout.php'>Logout</a>
  </li>";
    } -->