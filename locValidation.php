<?php
    session_start();
    $var=$_GET['location'];
    $loc_data=json_decode($var);
     
    $hour=$loc_data->{'hour'};
    $minutes=$loc_data->{'min'};
    $user=$_GET['x'];
    $status=null;
   // $work_date='2020-4-6';
    $lat=$loc_data->{'latitude'};
    $long=$loc_data->{'longitude'};
    $date=$loc_data->{'date'};  //Format YYYY:MM:DD
    $time=$loc_data->{'time'};  //Format HH:MM:SS
    $latitude=null;
    $longitude=null;

    if($hour >= '10' && $hour<='11' && $minutes <= '30') 
    { 
        $status='Present'; 
    } 
    else
    { 
        $status='Absent'; 
    }

    echo "<center>"."<h1>"."Your Attendance have been marked sucessfully !"."</h1>";

    echo "Your Location is:"."<br>";
    echo "<br>"."Lat: ".$lat."<br>"."Long: ".$long."<br>"."Date:".$date." "."Time:".$time."</center>" ;
$conn=mysqli_connect("localhost","root","","nikhil");
    if(!$conn){
        echo"Connection Error";
    }
    else{
        $query="insert into Location values('$lat','$long','$date','$time','$status','$user')";
        $res=mysqli_query($conn,$query);
    }
mysqli_close($conn);
?>
<a href="./logout.php">Logout</a>