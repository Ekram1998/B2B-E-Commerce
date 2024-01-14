<!-- database connection -->
<?php 
error_reporting(0);
include_once "../includes/connect.php";
include_once "../functions/common_function.php";
@session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registraion Page</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid my-3">
    <h2 class="text-center">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">

            <form action="" method="post">
                <!-- user Name feild -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">User Name</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter Your UserName" autocomplete="off" required="required" name="user_username">
                </div>
                     
                <!-- user Password feild -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">User Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                </div>
                
                
                
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Dont't have an account ? <a href="user_registration.php" class="text-danger">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- javascript cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<!-- php dynamic code -->
<?php 
if(isset($_POST['user_login'])){
    $user_name = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM user_table WHERE user_name='$user_name'";
    $result = mysqli_query($con,$select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // cart Item 
    $select_query_cart = "SELECT * FROM cart_details WHERE ip_address='$user_ip'";
    $selct_cart = mysqli_query($con,$select_query_cart);
    $row_count_cart = mysqli_num_rows($selct_cart);
    if($row_count>0){
        $_SESSION['username']=$user_name;
        if(password_verify($user_password,$row_data['user_password'])){
            // echo "<script>alert('Login Successfull')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_name;
                echo "<script>alert('Login Successfull')</script>";
                echo "<script>window.open('profile.php','_self')</script>"; 
            }
            else{
                $_SESSION['username']=$user_name;
                echo "<script>alert('Login Successfull')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
    else{
            echo "<script>alert('Does not Information Please first register')</script>";
    }

}
?>
