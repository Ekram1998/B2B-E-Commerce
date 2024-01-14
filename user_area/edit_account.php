<?php 
if(isset($_GET['edit_account'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM user_table WHERE user_name='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['user_name'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
}
    if(isset($_POST['user_update'])){
        $update_id = $user_id;
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp'];
        move_uploaded_file($user_image_tmp,'./user_images/$user_image');

        // update query 
        $update_data = "UPDATE user_table SET user_name='$user_name',user_email='$user_email',user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile' WHERE user_id=$update_id";
        $result_query_update=mysqli_query($con,$update_data);
        if($result_query_update){
            echo "<script>alert('Data Update Successfully')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account Page</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="from-outline mb-4">
            <input type="text" name="user_name" value="<?php echo $user_name;?>" class="form-control w-50 m-auto">
        </div>
        <div class="from-outline mb-4">
            <input type="email" name="user_email" value="<?php echo $user_email;?>" class="form-control w-50 m-auto">
        </div>
        <div class="from-outline mb-4 d-flex w-50 m-auto">
            <input type="file" name="user_image" class="form-control">
            <img src="./user_images/<?php echo $user_image3?>" alt="img" class="edit_img">
        </div>
        <div class="from-outline mb-4">
            <input type="text" name="user_address" value="<?php echo $user_address;?>" class="form-control w-50 m-auto">
        </div>
        <div class="from-outline mb-4">
            <input type="text" name="user_mobile" value="<?php echo $user_mobile;?>" class="form-control w-50 m-auto">
        </div>

        <input type="submit" value="Update" name="user_update" class="bg-info py-2 px-3 border-0">
    </form>
</body>
</html>