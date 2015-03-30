<?php
$page = $_SERVER['PHP_SELF'];
?>
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
                </div> <!-- /.logo -->
            </div> <!-- /.col-md-4 -->
            <div class="col-md-8 col-sm-6 col-xs-4">
                <div class="main-menu">
                    <a href="#" class="toggle-menu">
                        <i class="fa fa-bars"></i>
                    </a>
                    <ul class="menu">
                        <li><a href="user-manager.html">Admin</a></li>
                        <li><a href="..\user">Users</a></li>
                        <li><a href="..\team">Team</a></li>
                        <li><a href="cadastro-acoes.html">Actions</a></li>
                        <li><a href="setup.html">Setup</a></li>
                        <li><a href="relatorio.html">Reports</a></li>
                    </ul>
                </div> <!-- /.main-menu -->
            </div> <!-- /.col-md-8 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.main-header -->
<div class="main-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7">
                <div class="list-menu">
                    <ul>
                        <li><a href="http://10.112.0.210/flexmo">Home</a></li>
                        <li><a href="..\user">User</a></li>                                
                        <li><a href="..\team">Team</a></li>
                        <li><a href="team">link</a></li>
                        <li><a href="preventive-maintenance">link</a></li>
                    </ul>
                </div> <!-- /.list-menu -->
            </div> <!-- /.col-md-6 -->
            <div class="col-md-6 col-sm-5">
                <div class="notification">
                    <span><?php

                    $trans = "
                            Language | Idioma: 
                            
                            <a href='..\\functions/language.php?language=english&page=" . $page . "'>
                                <img src='..\images/eng.png' alt='English' style='width:40px;height:25px;border:0'>
                            </a>
                            <a href='..\\functions/language.php?language=portuguese&page=" . $page . "'>
                                <img src='..\images/ptbr.png' alt='Portuiguês' style='width:45px;height:25px;border:0'>
                            </a>
                    ";

                    echo $trans;
    
                ?> </span>
                </div>
            </div> <!-- /.col-md-6 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.main-nav -->    
    
<script src="..\js/vendor/jquery-1.10.1.min.js"></script>
<script>window.jQuery || document.write('<script src="..\js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
<script src="..\js/jquery.easing-1.3.js"></script>
<script src="..\js/bootstrap.js"></script>
<script src="..\js/plugins.js"></script>
<script src="..\js/main.js"></script>