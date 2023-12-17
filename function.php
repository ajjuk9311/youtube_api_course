<?php 
function authentication($username,$token,$conn){
    $query = "select * from users where username = '{$username}' and token= '{$token}' ";
    $result = mysqli_query($conn,$query);

    if($result && $result->num_rows>0){
        return true;
    }else{
        $res = array(
            'status'=>401,
            'msg'=>'Authentication failed!'
        );
        echo json_encode($res);
        exit;
    }
}

?>