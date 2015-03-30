<?php

require_once '..\functions/server.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $comm['pgTitle']; ?></title>

    <?php
    
    // Inclui cabeçario
    include_once '..\functions/header.php';
    
    ?>

</head>
<body> 
    
    <?php
    
    // Inclui menus superiores da pagina
    include_once '..\functions/menu1.php';
    
    ?>     
         <div class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        
                        <h3 class="widget-title"><?php echo $comm['pgTitle']; ?></h3>
                        <h5 class="text-danger">
                        
                         <?php                            
$users_query = check_data("
    SELECT    
        id,
        name,
        last_name,
        user_name,
        phone_ext,
        register,
        badge,
        home_phone,
        molibe_phone,
        email,
        home_adress
        neighborhood,
        city
        occupation,
        shift    
    FROM
        `tbl_users`
    WHERE 1
");


while ($users = mysqli_fetch_assoc($users_query)){
    echo '<pre>';
    print_r($users);    
    echo '<pre>';
}
?>
                        
                        </h5>    
                        <div class="contact-form">
                            
                        </div>
                    </div>                
                </div>
            </div>
</div>
    
    <?php
    
    // Inclui rodapé da pagina
    include_once '..\functions/menu2.php';
    
    ?> 
    
</body>
</html>  
         
                            

                         