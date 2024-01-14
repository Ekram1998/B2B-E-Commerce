<?php
$con = mysqli_connect("localhost","root","","mystore");

if($con->connect_errno){    
    echo "Not Connected to Database. Try again".$con->connect_error."Error Code :".$con->connect_errno;
}
else{
    // echo "Connection Successfully";
}

?>