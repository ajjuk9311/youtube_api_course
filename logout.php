<?php

include('connection.php');
include('function.php');

$json = file_get_contents('php://input');
$post = json_decode($json,true);

//authenticate firstly
$username = $post['username'];
$token = $post['token'];
authentication($username,$token,$conn);

$query = "UPDATE users SET token = '' where username = '{$username}' ";

$result = mysqli_query($conn,$query);

if($result){
    $res = array(
        'status'=>200,
        'msg'=>'Logout Successfully!'
    );
    echo json_encode($res);
    exit;
}else{
    $res = array(
        'status'=>401,
        'msg'=>'Error in logout!'
    );
    echo json_encode($res);
    exit;
}



?>