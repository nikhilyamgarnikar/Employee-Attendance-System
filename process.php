<?php

$fname=$_POST['Fname'];
$lname=$_POST['Lname'];
$email=$_POST['email'];
$mobile_no=$_POST['mobile'];
$loginId=$_POST['Login'];
$password=$_POST['Passwd'];
$ConfirmPassword=$_POST['Cpasswd'];

if($password != $ConfirmPassword){
    echo "Your confirmed password is different than new password";
}
else{
    $conn=mysqli_connect("localhost","root","","nikhil");
    if(!$conn){
        echo"Connection Error";
    }
    else{
        $query="insert into Emp_info values('$fname','$lname','$loginId','$password','$email','$mobile_no')";
        $result=mysqli_query($conn,$query);
        if($result){
            echo "records inserted successfully";
        }
        else{
            echo "problem in insertion";
        }
    }
    mysqli_close($conn);
}


?>