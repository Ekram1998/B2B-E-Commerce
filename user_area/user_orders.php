<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $user_name = $_SESSION['username'];
    $get_user = "SELECT * FROM user_table WHERE user_name='$user_name'";
    $result = mysqli_query($con,$get_user);
    $row_fatch = mysqli_fetch_assoc($result);
    $user_id = $row_fatch['user_id'];
    // echo $user_id;
    ?>
    <h3 class="text-success">All of My Orders</h3>
    <table class="table table-bordered mt-5">
        <thead>
            <tr class='bg-info'>
            <th>Sl No</th>
            <th>Amount Due</th>
            <th>Total Product</th>
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $get_order = "SELECT * FROM user_orders WHERE user_id='$user_id'";
            $result_orders = mysqli_query($con,$get_order);
            $number = 1;
            while($row_order=mysqli_fetch_assoc($result_orders)){
                $order_id = $row_order['order_id']; 
                $amount_due = $row_order['amount_due']; 
                $invoice_number = $row_order['invoice_number']; 
                $total_products = $row_order['total_products']; 
                $order_date = $row_order['order_date']; 
                $order_status = $row_order['order_status'];
                if($order_status=='pending'){
                    $order_status = 'Incomplete';
                } 
                else{
                    $order_status='Complete';
                }
                
                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>";
                ?>
                <?php 
                if($order_status=='Complete'){
                    echo "<td>paid</td>";
                }
                else{
                echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-center'>Confirm</a></td>
            </tr>";
                }
            $number++;
            }
            ?>
            
        </tbody>
    </table>
    
</body>
</html>