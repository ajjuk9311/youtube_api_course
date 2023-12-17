<?php
include('connection.php');
include('function.php');

$json = file_get_contents('php://input');
$post = json_decode($json,true);

//authenticate firstly
$username = $post['username'];
$token = $post['token'];
authentication($username,$token,$conn);

$region_where = '';
if(isset($post['region']) && $post['region']!=''){
    $region = $post['region'];
    $region_where = " where region = '{$region}'";
}

$statename_where ='';
if(isset($post['statename']) && $post['statename']!=''){
    $statename = $post['statename'];
    $statename_where = " and statename = '{$statename}' ";

}
$query = "select * from citylist {$region_where}  {$statename_where} ";

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