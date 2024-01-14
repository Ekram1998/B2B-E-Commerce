<!-- Database Connection -->
<?php 
include_once "../includes/connect.php";

if(isset($_POST['insert_brand'])){
    $brand_title = $_POST['brand-title'];

    // Select databse
    $select_query = "SELECT * FROM brands WHERE brand_title='$brand_title'";
    $result_select = mysqli_query($con,$select_query);
    $number_query = mysqli_num_rows($result_select);

    if($number_query>0){
        echo "<script>alert('Brand is Present this Database.')</script>";
    }
    else{
    $ins_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
    $query_result = mysqli_query($con,$ins_query);
    if($query_result){
        echo "<script>alert('Brand has been Inserted Successfully.')</script>";
    }
    }
}

?>


<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand-title" placeholder="Insert Brands" aria-label="brands">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" value="Insert Brands">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert Brands</button> -->
    </div>

</form>