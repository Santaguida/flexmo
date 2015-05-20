<?php session_start(); ?>

<!-- 
    Developed by Fernando Henrique Santaguida and Gabriel Nazato
    			http://www.fernandohs.com.br
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<?php

// Chama função que conecta o server
require_once '..\..\functions/server.php';

// deleta um item do menu
if(isset($_GET['acao'])){
    if($_GET['acao'] == 'deletar'){
        $id = (int)$_GET['id'];
        check_data("delete from tbl_fct_problem where id = $id");
        header("Location: problem.php");
    }
}

// recebe os dados do formulario
if(isset($_GET['prob'])){
    $prob = $_GET['prob'];    
    $aviso = '';
    
    if(empty($prob)){
        $aviso .= 'O problema é obrigatorio<br />';
    }    
    if(empty($aviso)){
        // verifica se esta recebendo o id do formulario
        // se tiver edita
        // se nao cadastra novo registro
        if(!empty($_GET['id'])){
        $id = (int)$_GET['id'];
        check_data("update tbl_fct_problem set problem = '$prob' where id = $id");
    }else{
        check_data("insert into tbl_fct_problem(problem)
                        values ('$prob')");
    }
            header("location: problem.php");
    }
}

// busca itens cadastrados para mostrar na tela
$itensQuery = check_data("select * from tbl_fct_problem order by id asc");

?>
    
<head>
    
    <!--
    include head start
    -->
    
    <?php include_once '..\..\functions/header.php'; ?>   
        
	<!--
    include head end
    -->
    
	<title>FleXmo</title>
<script type="text/javascript">
        function deletar(id){
            if(confirm("Voce tem certeza que quer deletar este registro ?")){
                window.location = "problem.php?acao=deletar&id=" + id;
            }
        }
</script>
</head>

<body>

<!-- include menu1 start -->

<?php include_once '..\..\functions/menu1.php'; ?>
<div id="main">
    <!-- include menu1 end -->       
        
                    <h3 class="widget-title">Cadastro de problemas</h3>
                     <?php
                            
                        // Caso exista um alerta, imprime na tela
                        // Caso não, mantem mensagem HTML
                        if(!empty($alert)){
                            print '</br>' . $alert;
                                }                            
                        else{
                            print 'Campo obrigatório*';
                            }                           
                            
                    ?>
                    
<table class="clean_table" cellspacing="0" cellpadding="0" border="0">
    <tr>      
      <th>Problemas</th>      
      <th>Ações</th>
    </tr>
    <?php // mostra os registros do banco ?>  
    <?php while($itens = mysqli_fetch_array($itensQuery)): ?>  
        <tr>
            <form class="login_form" action="problem.php" method="get" >
                <input type="hidden" name="id" value="<?php print $itens['id']; ?>"/>
                <td><input type="text" name="prob" value="<?php print $itens['id'].'- '. $itens['problem']; ?>"/></td>                
                <td>
                    <input type="submit" value="Editar"/>
                    <input type="button"  value="deletar" onclick="deletar(<?php print $itens['id']; ?>)"/>
                </td>
            </form>
        </tr>
    <?php endwhile; ?>
      
      <?php // formulario para cadastro de novo item ?> 
        <tr>
    <form action="problem.php" method="get" >
      <td><input type="text" name="prob" /></td>         
      <td>
          <input type="submit" value="Novo cadastro" />
      </td>
    </form>
        </tr>
</table>
                
</div>    
	<!-- include menu2 start -->
    
<?php include_once '..\..\functions/menu2.php'; ?>   

	<!-- include menu2 end -->
    
</body>
</html>

