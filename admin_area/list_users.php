

<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-3">
    <thead class="bg-info">

    <?php
    $get_user = "SELECT * FROM user_table";
    $result = mysqli_query($con,$get_user);
    $row_count=mysqli_fetch_row($result);
    echo "<tr class='text-center'>
    <th>Sl No</th>
    <th>User Name</th>
    <th>User Email</th>
    <th>User Address</th>
    <th>User Mobile</th>
    <th>Delete</th>
    </tr>
    </thead>
    <tbody>";

    if($row_count==0){
        echo "<h2 class='text-dander text-center mt-5'>No Users Yet</h2>";
    }
    else{
        $number = 0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_name = $row_data['user_name'];
            $user_email = $row_data['user_email'];
            $user_image = $row_data['user_image'];
            $user_address = $row_data['user_address'];
            $user_mobile = $row_data['user_mobile'];
            $number++;
            echo "<tr class='text-center'>
            <td>$number</td>
            <td>$user_name</td>
            <td>$user_email</td>
            <td><img src='../user_area/user_images/$user_image' alt='$user_image' class='product_image'></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a href=''><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        }
    }    
    ?>
    </tbody>
</table>