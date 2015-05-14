<?php $page = $_SERVER['PHP_SELF']; ?>
    
    <header class="site-header">
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-8">
                        <div class="logo">
                            <h1>
                            	<a href="http://10.112.0.210/flexmo">
                            		<img src="http://10.112.0.210/flexmo/images/banner.png" alt="Logo" ">                               
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
                                <li><a href="http://10.112.0.210/flexmo/user">Users</a></li>
                        		<li><a href="http://10.112.0.210/flexmo/team">Team</a></li>
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
                                <li><a href="http://10.112.0.210/flexmo/user">User</a></li>                                
                                <li><a href="http://10.112.0.210/flexmo/team">Team</a></li>
                                <li><a href="http://10.112.0.210/flexmo/fct/forms/FCT_Products.php">FCT</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-5">
                        <div class="notification">
                            <span>
                            	<?php

									$trans = "
											Language | Idioma: 
											
											<a href='http://10.112.0.210/flexmo/functions/language.php?language=english&page=" . $page . "'>
												<img src='http://10.112.0.210/flexmo/images/eng.png' alt='English'
												style='width:40px;height:25px;border:0'>
											</a>
											<a href='http://10.112.0.210/flexmo/functions/language.php?language=portuguese&page=" . $page . "'>
												<img src='http://10.112.0.210/flexmo/images/ptbr.png' alt='Portuiguês' 
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
    
    