<?php 
if(isset($_GET['delete_product'])){
    $delete_id = $_GET['delete_product'];

    $delete_product = "DELETE FROM products WHERE product_id =$delete_id";
    $delete_query = mysqli_query($con,$delete_product);
    if($delete_query){
        echo "<script>alert('Product Deleted Successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}

?>