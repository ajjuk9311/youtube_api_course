<?php
include('connection.php');

$json = file_get_contents('php://input');
$post = json_decode($json,true);

//username validation

if(!isset($post['username']) || empty($post['username'])){
    $res = array(
        'status'=>401,
        'msg'=>'Username is Required!'
    );
    echo json_encode($res);
    exit;
}

//password validation

if(!isset($post['password']) || empty($post['password'])){
    $res = array(
        'status'=>401,
        'msg'=>'Password is Required!'
    );
    echo json_encode($res);
    exit;
}

$username = $post['username'];
$password = md5($post['password']);


$query = "SELECT * FROM users where username = '{$username}'";

$result = mysqli_query($conn,$query);

if(!$result || $result->num_rows == 0){
    $res = array(
        'status'=>401,
        'msg'=>'User not found!'
    );
    echo json_encode($res);
    exit;  
}

$userdata = mysqli_fetch_assoc($result);

if($userdata['password'] != $password){
    $res = array(
        'status'=>401,
        'msg'=>'Password is incorrect!'
    );
    echo json_encode($res);
    exit;
}

//token updation

$token = 'RG'.bin2hex(random_bytes(16)).'RG';
$query = "UPDATE users SET token = '{$token}' where username = '{$username}' ";
mysqli_query($conn,$query);

$userdata['token'] = $token;

$res = array(
    'status'=>200,
    'data'=>$userdata,
    'msg'=>'Login Successfully!'
);
echo json_encode($res);
exit;

?>