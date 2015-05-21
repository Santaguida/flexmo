<?php

require_once 'server.php';

function check_duplicity($fieldC){
    $have = check_data("select id from tbl_users where user_name = '$fieldC'");
        if(mysqli_num_rows($have) > 0){
            return true;
        }else{
            return false;
        }    
}