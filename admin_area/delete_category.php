<?php 
if(isset($_GET['delete_category'])){
    $delete_id = $_GET['delete_category'];

    $delete_category = "DELETE FROM categories WHERE category_id =$delete_id";
    $delete_query = mysqli_query($con,$delete_category);
    if($delete_query){
        echo "<script>alert('Category is been Deleted Successfully')</script>";
        echo "<script>window.open('./index.php?view_category','_self')</script>";
    }
}

?>