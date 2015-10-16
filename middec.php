<?php
$ck = $_POST['mid'];
$res = explode(",",$ck);
array_pop($res);
$middic = [];
foreach($res as $str) {
    $mid = 0;
    $result = "";
    if(check($middic,$str)){
        echo get($middic,$str).",";
    }else{
        while ($result !== $str) {
            $mid++;
            $result = hash('crc32b', (string)$mid);
        }
        array_push($middic,$mid);
        echo $mid.",";
    }
}

function check($dic,$str){
    foreach($dic as $mid){
        $result = hash('crc32b', (string)$mid);
        if($result == $str)
            return true;
    }
    return false;
}

function get($dic,$str){
    foreach($dic as $mid){
        $result = hash('crc32b', (string)$mid);
        if($result == $str)
            return $mid;
    }
    return false;
}
?>