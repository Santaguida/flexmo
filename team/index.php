<?php

require_once '..\functions/server.php';

echo "<p><a href='..\home'>Home</a></p>";

$users_query = check_data("SELECT * FROM `tbl_users` WHERE 1");
while ($users = mysqli_fetch_assoc($users_query)){
    echo '<pre>';
    print_r($users);    
    echo '<pre>';
}

?>
