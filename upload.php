<?php
    include('function.php');
    
    header('Content-Type: application/json');
    if($_FILES['image']['name']==''){
        $res = array(
            'status'=>401,
            'msg'=>'Image not found'
        );
        echo json_encode($res);
        exit;
    }


    
    $image_name = time().$_FILES['image']['name'];
    
    $upload_path = 'uploads/'.$image_name;
    
    $result = move_uploaded_file($_FILES['image']['tmp_name'],$upload_path);
    if($result){
        $res = array(
            'status'=>200,
            'msg'=>'Image uploaded successfully',
            'url'=>base_url().$upload_path
        );      
        echo json_encode($res);
        exit;
    }else{
        $res = array(
            'status'=>401,
            'msg'=>'Error in image uploading!',
            
        );      
        echo json_encode($res);
        exit;
    }
?>