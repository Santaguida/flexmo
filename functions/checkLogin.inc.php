<?php

require_once 'server.php';

function check_login($login){
    $haveLogin = data_check("select id from tbl_user_name where user_name = '$login'");
        if(mysqli_num_rows($haveLogin) > 0){
            return true;
        }else{
            return false;
        }    
}

