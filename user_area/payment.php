<!-- database connection -->
<?php 
include_once "../includes/connect.php";
include_once "../functions/common_function.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pament Page</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
<style>
        .payment_img{
            width: 80%;
            border: 1px solid green;
        }
    </style>
  
</head>
<body>
    <!-- php code to access user id -->
    <?php
    $user_ip = getIPAddress();
    $get_user = "SELECT * FROM user_table WHERE user_ip='$user_ip'";
    $result = mysqli_query($con,$get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    ?>
    

    <div class="container">
        <h2 class="text-center text-info">Payment Option</h2>
        <div class="row d-flex justify-content-center aline-items-center my-5">
            <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><img src="../images/paypl.png" alt="img" class="payment_img"></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>  
        </div>
    </div>

    <!-- include footer -->
<?php include_once "../includes/footer.php";?>

<!-- javascript cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
