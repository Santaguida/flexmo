<?php

require_once 'server.php';

function check_login($user){
    $haveLogin = check_data("select id from tbl_users where user_name = '$user'");
        if(mysqli_num_rows($haveLogin) > 0){
            return true;
        }else{
            return false;
        }    
}

