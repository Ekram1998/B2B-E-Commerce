<!-- Connect the database -->
<?php
require_once "../includes/connect.php";
session_start();

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $select_data = "SELECT * FROM user_orders WHERE order_id='$order_id'";
    $result = mysqli_query($con,$select_data);
    $row_fetch= mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
    
    $invoice_number = $_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "INSERT INTO user_payments (order_id,invoice_number,amount,payment_mode,date) VALUES ('$order_id','$invoice_number','$amount','$payment_mode',NOW())";
    $result_con=mysqli_query($con,$insert_query);
    if($result_con){
        echo "<script>alert('Payment Successfully Done.')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    
    $update_order = "UPDATE user_orders SET order_status='Complete' WHERE order_id=$order_id";
    $result_orders = mysqli_query($con,$update_order);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Order page</title>
     <!-- Bootstrap css link  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <h1 class="text-center m-5">Confirm Payment</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="" class="">Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number; ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="">Amount Pay</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due; ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" id="" class="form-select w-50 m-auto">
                    <option value="">Select Payment Mode</option>
                    <option value="Bkash">Bkash payment</option>
                    <option value="nagad">nagad payment</option>
                    <option value="Rocket">Rocket payment</option>
                    <option value="CashOn">Cash On Dalibary</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" name="confirm_payment" id="" class="bg-info py-2-border-0" value="Confirm">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <a href="profile.php">Back to Profile</a>
            </div>
        </form>
    </div>






<!-- Bootstrap javascript link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>