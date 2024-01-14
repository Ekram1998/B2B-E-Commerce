<?php 
if(isset($_GET['delete_brand'])){
    $delete_id = $_GET['delete_brand'];

    $delete_brand = "DELETE FROM brands WHERE brand_id =$delete_id";
    $delete_query = mysqli_query($con,$delete_brand);
    if($delete_query){
        echo "<script>alert('Brand is been Deleted Successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}

?>