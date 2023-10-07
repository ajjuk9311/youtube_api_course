<?php
include('connection.php');

$query = "select * from citylist";
$result = mysqli_query($conn,$query);

if($result->num_rows > 0){
   $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $new_data = json_encode($data);
    echo $new_data;
}


//mysqli_query($conn,$query);
//mysqli_fetch_assoc($result);
//mysqli_fetch_all($result,MYSQLI_ASSOC);
//json_encode($arr)
//json_decode($arr,true);




?>