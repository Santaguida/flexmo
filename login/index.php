<?php
	$ivalid_login=false;

	if(isset($_POST["user"]))
	{		
		
		//Código para a verificar usuário e senha no Banco de dados
		
		
		//Se o usuário não existir, seta a variável $ivalid_login=true
		global $ivalid_login;
		$ivalid_login = true;
	}	
?>

<html>
	<head>
    	<title>
        	flexMo - User Login
        </title>
        
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

	<body>
    	<div class="div_login">
        	<h3 class="blue_title">User Login</h3>
        	                  
            <form name="login_form" id="login_form" action="" method="post">
            	<p>
                    <input name="user" type="text" id="user" placeholder="Username" autofocus required>
                </p>
                <p>
                    <input name="pwd" type="password" id="pwd" placeholder="Password" required>
                </p>
                
                <?php				
				if($ivalid_login==true)
				{
					echo "<h5 class='red_danger'>Username or password doesn't exist!</h5>";
				}
				else
				{
					echo "<br>";
				}
			
				?>
            
                <p>
                    <input type="submit" class="button_blue" id="submit" value="Entrar">
                </p> 
            </form>
        </div>
    </body>
</html>