<?php

$loginId=$_POST['loginId'];
$passwd=$_POST['passwd'];
$count=0;
echo "loginId";
if($loginId == 'admin'){
    header("Location: .\admin.php");
}
else{
header("Location: .\locValidation.php?x=".$loginId);
$conn=mysqli_connect("localhost","root","","nikhil");
if(!$conn){
    echo"Connection Error";
}

else{
    $query="SELECT * FROM emp_info WHERE Login_id='$loginId' AND Password='$passwd'";
    
    $result=mysqli_query($conn,$query);
    
    //while($tupple=mysqli_fetch_assoc($result)){
        //$loginId==$tupple['loginId'] && $passwd==$tupple['passwd']
        if($tupple=mysqli_fetch_assoc($result)){
            $count=1;
            
            session_start();
	       $_SESSION['loginId']=$tupple['Fname'];
           $_SESSION['loginId1']=$tupple['Lname'];     
            //echo $tupple['fName'];
            header('Location:.\attendancePage.php');
        }
    
    if($count==0){
        echo "Invalid LoginId Password !";
        header('Location:.\index.php');
        
    }
}
mysqli_close($conn);
}
/*if($username=="DKTE" && $password=="DKTE123")
{    
	session_start();
	$_SESSION['username']=$username;
    header('Location:.\secured.php');
}
else
{
    header('Location:.\index.php');
}*/


?>