<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'api_course';

$conn = mysqli_connect($hostname,$username,$password,$database);

if(!$conn){
    die('Connection failed: '.mysqli_error());
}else{
    echo "database connected";
}


?>