<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
    <?php
        
            $servidor = 'flexmo';
            $user = 'root';
            $senha = '';
            $db = 'flexmo_db';
            
            $conexao = mysql_connect($servidor, $user, $senha) or die(mysqli_error());
            
            $banco = mysql_select_db($db, $conexao) or die(mysqli_error());      
        
        
        
        mysql_query("SET NAMES 'utf8'");
        mysql_query('SET caracter_set_connection=utf8');
        mysql_query('SET caracter_set_client=utf8');
        mysql_query('SET caracter_set_results=utf8');
        
        
        $SQL = "SELECT `id`, `titulo`, `title`, `texto`, `text` FROM `tests` ORDER BY id DESC LIMIT 1";
        $select = mysql_query($SQL);
        if (mysql_num_rows($select)){
            $linha = mysql_fetch_array($select);
            $texto = $linha['texto'];
            $text = $linha['text'];
            $titulo = $linha['titulo'];
            $title = $linha['title'];          
        }
        
        // pega a pagina atual
        $pagina = $_SERVER['PHP_SELF'];
        
        session_start();
        if (isset($_SESSION["idioma"])){
            if ($_SESSION["idioma"]=="portugues"){
                $idioma = "portugues";
                include_once 'ptbr.php';
            }elseif ($_SESSION["idioma"]== "ingles") {
                $idioma = "ingles";
                include_once 'eng.php';
            }
        }
        else {
            $idioma = "portugues";
        }
        
    ?>
    
    <p>
        <?php echo $home; ?>
    </p>
    <p>
        <?php echo $aboutus; ?>
    </p>
    <p>
        <?php echo $services; ?>
    </p>
    <p>
        Idioma | Language <a href="idioma.php?idioma=portugues&pagina=<?php echo $pagina; ?>">Portugues | </a> <a href="idioma.php?idioma=ingles&pagina=<?php echo $pagina; ?>">English</a>
    </p>    
    <?php
        if ($idioma == "portugues"){
        echo "<p>".$titulo."</p>"."<p>".$texto."</p>"; 
            }elseif ($idioma == "ingles"){
            echo "<p>".$title."</p>"."<p>".$text."</p>";            
            }
    ?>
    
    
</body>
</html>