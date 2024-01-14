<!-- database connection -->
<?php 
error_reporting(0);
include_once "../includes/connect.php";
include_once "../functions/common_function.php";
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
    <h2 class="text-center">New User Registraion</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- user Name feild -->
                <div class="form-outline mb-2">
                    <label for="user_username" class="form-label">User Name</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter Your UserName" autocomplete="off" required="required" name="user_username">
                </div>
                <!-- user Email feild -->
                <div class="form-outline mb-2">
                    <label for="user_email" class="form-label">User Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="user_email">
                </div>
                <!-- user image feild -->
                <div class="form-outline mb-2">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                </div>
                <!-- user Password feild -->
                <div class="form-outline mb-2">
                    <label for="user_password" class="form-label">User Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                </div>
                <!-- user confirm Password feild -->
                <div class="form-outline mb-2">
                    <label for="user_conpassword" class="form-label">User Confirm Password</label>
                    <input type="password" id="user_conpassword" class="form-control" placeholder="Enter Your Confirm Password" autocomplete="off" required="required" name="user_conpassword">
                </div>
                <!-- user Address feild -->
                <div class="form-outline mb-2">
                    <label for="user_address" class="form-label">User Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" required="required" name="user_address">
                </div>
                <!-- user Contact feild -->
                <div class="form-outline mb-2">
                    <label for="user_contact" class="form-label">User Mobile Number</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off" required="required" name="user_contact">
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php" class="text-danger">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- javascript cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<!-- php server code insert the data Database -->

<?php

if(isset($_POST['user_register'])){
    $user_name = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
    $user_conPassword = $_POST['user_conpassword'];
    $user_address = $_POST['user_address'];
    $user_phone = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();
    


    // select query 
    $select_query="SELECT * FROM user_table WHERE user_name='$user_name' OR user_email='$user_email'";
    $result = mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('UserName & Email already exist this site.')</script>";
    }
    else if($user_password!=$user_conPassword){
        echo "<script>alert('Password does not match.')</script>";
    }
    else{
    // insert query 
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query = "INSERT INTO user_table(user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES ('$user_name','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_phone')";
    $sql_execute = mysqli_query($con,$insert_query);
    // if($sql_execute){
    //     echo "<script>Data Inserted Successfully.')</script>";
    //     header("Refresh:0");
    // }
    // else{
    //     die(mysqli_error($con));
    // }
}
// selecting cart item
$select_cart_item="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
$result_cart = mysqli_query($con,$select_cart_item);
$row_count1 = mysqli_num_rows($result_cart);
if($row_count1>0){
    $_SESSION['username']=$user_name;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
}
else{
    echo "<script>window.open('../index.php','_self')</script>";
}
}
?>