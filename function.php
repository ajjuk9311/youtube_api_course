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

function base_url(){
    if($_SERVER['SERVER_PORT']==443){
        $protocol='https://';
    }else{
        $protocol='http://';
    }
    $base_url = $protocol.$_SERVER['SERVER_NAME'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    
    return $base_url;
}

?>