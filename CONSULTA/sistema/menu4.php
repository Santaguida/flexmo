<?php
require_once 'servidor.php';
$itensQuery = consulta_dados("select * from links order by ordem asc");
?>
<div id="templatemo_wrapper">	
    <div id="templatemo_site_title_bar">
      <ul class="social_network">
    <li></li>
            <li></li>	
            <li></li>
        </ul>
            
    </div> <!-- end of templatemo_site_title_bar -->
    
    <div id="templatemo_menu">
    
        <ul>
            <li><a href="index.php" class="current">Home</a></li>
            <?php while($itens = mysqli_fetch_array($itensQuery)): ?>
            <li><a href="<?php print $itens['url']; ?>">
                <?php print $itens['nome']; ?>
                </a>
            </li>
            <?php endwhile; ?>
        </ul>    	
    
    </div> <!-- end of templatemo_menu -->
    
       
    <div id="templatemo_banner">

	    <div id="banner_left">
        
        	<h2>&nbsp;</h2>
<div class="cleaner_h20"></div>
            
            
        </div>
        
        <div id="banner_right">
        
        	<div class="banner_button">
            	<a href="#">Support</a>
            </div>
            
            <div class="banner_button">
            	<a href="#">Services</a>
            </div>
            
            <div class="banner_button">
            	<a href="#">Demos</a>
            </div>
        
        </div>
        
    </div> <!-- end of templatemo_banner -->
    
    <div id="templatemo_content_top"></div>
    <div id="templatemo_content">
      <p>&nbsp;</p>