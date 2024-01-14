

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delect Account</title>
</head>
<body>
    <h3 class="text-denger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" name="delete" class="form-control w-50 m-auto" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" name="dont_delete" class="form-control w-50 m-auto" value="Don't Delete Account">
        </div>
    </form>
</body>
</html>

<?php
$username_session = $_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query = "DELETE FROM user_table WHERE user_name='$username_session'";
    $result = mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account Deleted Successfully')</script>";
        header("refresh:1 url= ../index.php");
    }
}

if(isset($_POST['dont_delete'])){
    header("refresh:1 url= profile.php");
}

?>