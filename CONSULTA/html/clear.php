<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- 
    Developed by Fernando Henrique Santaguida and Gabriel Nazato
    http://www.fernandohs.com.br
    -->
    
    <!--
    include head start
    -->
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    
    <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="shortcut icon" href="favicon.gif" type="image/gif">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet">
        
    <link rel="stylesheet" href="..\css/bootstrap.css">
    <link rel="stylesheet" href="..\css/normalize.min.css">
    <link rel="stylesheet" href="..\css/font-awesome.min.css">
    <link rel="stylesheet" href="..\css/animate.css">
    <link rel="stylesheet" href="..\css/templatemo-misc.css">
    <link rel="stylesheet" href="..\css/templatemo-style.css">
    <link rel="stylesheet" type="text/css" href="..\css/style.css">

    <script src="..\js/vendor/modernizr-2.6.2.min.js"></script>
    
	<!--
    include head end
    -->
    
	<title>FleXmo</title>

</head>

<body>

<!-- include menu1 start -->

<?php $page = $_SERVER['PHP_SELF']; ?>
    
    <header class="site-header">
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-8">
                        <div class="logo">
                            <h1>
                            	<a href="http://10.112.0.210/flexmo">
                            		<img src="..\images/banner.png" alt="Logo" ">                               
                        		</a>
                            </h1>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-4">
                        <div class="main-menu">
                            <a href="#" class="toggle-menu">
                                <i class="fa fa-bars"></i>
                            </a>
                            <ul class="menu">
                                <li><a href="..\user">Users</a></li>
                        		<li><a href="..\team">Team</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <div class="list-menu">
                            <ul>
                                <li><a href="http://10.112.0.210/flexmo">Home</a></li>
                                <li><a href="..\user">User</a></li>                                
                                <li><a href="..\team">Team</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-5">
                        <div class="notification">
                            <span>
                            	<?php

									$trans = "
											Language | Idioma: 
											
											<a href='..\\functions/language.php?language=english&page=" . $page . "'>
												<img src='..\images/eng.png' alt='English'
												style='width:40px;height:25px;border:0'>
											</a>
											<a href='..\\functions/language.php?language=portuguese&page=" . $page . "'>
												<img src='..\images/ptbr.png' alt='Portuiguês' 
												style='width:45px;height:25px;border:0'>
											</a>
									";

                    				echo $trans;
    
                			?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="content-section">
    <!-- include menu1 end -->
        Container
	<!-- include menu2 start -->
</div>

<footer class="site-footer">
        <div class="our-partner">
        </div>
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span>Flexible Monitoring System - Version 1.0 @ 2015</span>
                        <p>Developed by: Fernando Santaguida, Gabriel Nazato e Test Support team</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    
    <script src="..\js/vendor/jquery-1.10.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="..\js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="..\js/jquery.easing-1.3.js"></script>
    <script src="..\js/bootstrap.js"></script>
    <script src="..\js/plugins.js"></script>
    <script src="..\js/main.js"></script>

	<!-- include menu2 end -->
    
</body>
</html>