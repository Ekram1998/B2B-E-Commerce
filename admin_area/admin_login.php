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
    <h2 class="text-center">Admin Login</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- user Name feild -->
                <div class="form-outline mb-2">
                    <label for="admin_username" class="form-label">UserName</label>
                    <input type="text" id="admin_username" class="form-control" placeholder="Enter Your UserName" autocomplete="off" required="required" name="admin_username">
                </div>
                
               
                <!-- user Password feild -->
                <div class="form-outline mb-2">
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="password" id="admin_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="admin_password">
                </div>

                
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="admin_login">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't you have an account ? <a href="admin_registration.php" class="text-danger">Register</a></p>
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
if(isset($_POST['admin_login'])){
    $admin_name = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    $select_query = "SELECT * FROM admin_table WHERE admin_name='$admin_name'";
    $result = mysqli_query($con,$select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    if($row_data>0){

        $_SESSION['username']=$admin_name;
        if(password_verify($admin_password,$row_data['admin_password'])){
            echo "<script>alert('Login Successfull')</script>";
            echo "<script>window.open('index.php','_self')</script>";
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
