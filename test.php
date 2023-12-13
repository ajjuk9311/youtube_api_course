<?php

// $a = "1";
// $c = "2";
// $b = "1ab";

// echo $a + $b + $c ; 

$d = [1, 2, 3, 4, 1, 2, 3, 4, 5];
$non_dup = [];
for($i = 0;$i<count($d);$i++){
    for($j=1;$j<count($d)-1;$j++){
        if($d[$i]==$d[$j]){
            $non_dup[] = $d[$i];
        }
    }
}
echo "<pre>";print_r($non_dup);

// dependency injuction
// docker
// redis
// slave
// query without using having duplicate
// php artisan command for drop particular migration
?>