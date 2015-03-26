<?php
	$invalid_login=false;

	if(isset($_POST["user"]) && isset($_POST["pwd"]))
	{		
		
		//Connects to the server
		require_once '..\functions/server.php';
		
		//Query the user in the database
		$query = "SELECT name, last_name FROM tbl_users WHERE user_name='" . $_POST["user"] ."' AND password='" . md5($_POST["pwd"]) . "'";
		$result = check_data($query);
		$result_array = mysqli_fetch_array($result);
		
		//Checks if the user exists
		if(mysqli_num_rows($result) != 0)
		{
			//Start a new session
			session_start();
			$_SESSION["user"] = $_POST["user"];
			$_SESSION["name"] = $result_array["name"] . " " . $result_array["last_name"];
			
			//In case there is no destination stablished, define destination as "..\home\index.php"
			if(!isset($_SESSION["destination"]))
			{
				$_SESSION["destination"] = "..\home";
			}
			
			//Go to destination
			header("location: " . $_SESSION["destination"]);
		}
		
		//If the user does not exists
		global $invalid_login;
		$invalid_login = true;
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
				//In case $invalid_login is set to "true", warns of wrong user
				if($invalid_login==true)
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