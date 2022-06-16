<?php


function pr($arr){
    echo '<pre>';
    print_r($arr);
}

function prx($arr){
    echo'<pre>';
    print_r($arr);
    die();
}

function get_save_value($new_conn,$str){
    if($str!=''){
    return mysqli_real_escape_string($new_conn,$str);
    }
}

?>

