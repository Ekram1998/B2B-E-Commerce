<!-- database connection -->
<?php 
error_reporting(0);
session_start();
// if(!isset($_SESSION['username'])){
//     header('location: admin_login.php');
// }
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
    <h2 class="text-center">Admin Registraion</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- user Name feild -->
                <div class="form-outline mb-2">
                    <label for="admin_name" class="form-label">UserName</label>
                    <input type="text" id="admin_name" class="form-control" placeholder="Enter Your UserName" autocomplete="off" required="required" name="admin_name">
                </div>
                <!-- user Email feild -->
                <div class="form-outline mb-2">
                    <label for="admin_email" class="form-label">Email</label>
                    <input type="email" id="admin_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="admin_email">
                </div>
                <!-- user image feild -->
               
                <!-- user Password feild -->
                <div class="form-outline mb-2">
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="password" id="admin_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="admin_password">
                </div>
                <!-- user confirm Password feild -->
                <div class="form-outline mb-2">
                    <label for="admin_conpassword" class="form-label">Confirm Password</label>
                    <input type="password" id="admin_conpassword" class="form-control" placeholder="Enter Your Confirm Password" autocomplete="off" required="required" name="admin_conpassword">
                </div>
                <!-- user Address feild -->
                
                <!-- user Contact feild -->
                
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="admin_register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="admin_login.php" class="text-danger">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>


<?php

if(isset($_POST['admin_register'])){
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hash_password = password_hash($admin_password,PASSWORD_DEFAULT);
    $admin_conpassword = $_POST['admin_conpassword'];
    // $user_ip = getIPAddress();
    


    // select query 
    $select_query="SELECT * FROM admin_table WHERE admin_name='$admin_name' OR admin_email='$admin_email'";
    $result = mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('UserName & Email already exist this site.')</script>";
    }
    else if($admin_password!=$admin_conpassword){
        echo "<script>alert('Password does not match.')</script>";
    }
    else{
    // insert query 
    $insert_query = "INSERT INTO admin_table(admin_name,admin_email,admin_password) VALUES ('$admin_name','$admin_email','$hash_password')";
    $sql_execute = mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>Data Inserted Successfully.')</script>";
        header("Refresh:1; url=admin_login.php;");
    }
    else{
        die(mysqli_error($con));
    }
}
}
?>

<!-- javascript cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

