<!-- database connection -->
<?php 
include_once "../includes/connect.php";
include_once "../functions/common_function.php";
// include_once "../includes/header.php";

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

// getting total items and total price of all items
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con,$cart_query_price);
$invoice_number = mt_rand();
$status='pending';
$count_products=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * FROM products WHERE product_id='$product_id'";
    $run_price = mysqli_query($con,$select_product);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price = array($row_product_price['product_price']);
        $product_price2=array_sum($product_price);
        $total_price+=$product_price2;
    }
}
// getting quentity form cart 
$get_cart = "SELECT * FROM cart_details";
$run_cart = mysqli_query($con,$get_cart);
$get_itme_quentity = mysqli_fetch_array($run_cart);
$quentity = $get_itme_quentity['quantity'];
if($quentity==0){
    $quentity=1;
    $subtotal=$total_price;
}
else{
    $quentity=$quentity;
    $subtotal=$total_price*$quentity;
}
$insert_orders="INSERT INTO user_orders(user_id,amount_due,invoice_number,total_products,order_date,order_status)VALUES($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
$result_query = mysqli_query($con,$insert_orders);
if($result_query){
    echo "<script>alert('Orders are submitted Successfully')</script>";
    // echo "<script>Window.open('profile.php','_self')</script>";
    header("refresh:1 url= profile.php");
}

$insert_panding_order="INSERT INTO orders_pending(user_id,invoice_number,product_id,quentity,order_status)VALUES($user_id,$invoice_number,$product_id,$quentity,'$status')";
$result_pending_order = mysqli_query($con,$insert_panding_order);

// delete items quey 
$empty_cart = "DELETE FROM cart_details WHERE ip_address='$get_ip_address'";
$result_delete = mysqli_query($con,$empty_cart);

?>

<!-- javascript cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>