<?php session_start();

if(isset($_SESSION['usuario']['id'])){
    if($_SESSION['usuario']['status'] > 0){
 


/**
 * gera o select para o campo ordem
 * 
 * @param type $ordem
 * @return string
 */
function select_ordem($ordem = 0){
    $saida = '';
    $saida .= '<select name="ordem" id="ordem">';
    for($i = -10; $i <= 10; $i++){
        $saida .= '<option value="' . $i . '"';
        if($i == $ordem){
            $saida .= 'selected';
        }    
        $saida .= '>' . $i . '</option>';
    }
    $saida .= '</select>';
    return $saida;
}

require_once 'servidor.php';

// deleta um item do menu
if(isset($_GET['acao'])){
    if($_GET['acao'] == 'deletar'){
        $id = (int)$_GET['id'];
        consulta_dados("delete from links where id = $id");
        header("Location: administra-menu.php");
    }
}

// recebe os dados do formulario
if(isset($_GET['nome'])){
    $nome = $_GET['nome'];
    $url = $_GET['url'];
    $ordem = $_GET['ordem'];
    $aviso = '';
    
    if(empty($nome)){
        $aviso .= 'O nome do link e obrigatorio<br />';
    }
    if(empty($url)){
        $aviso .= 'O endereco e obrigatorio<br />';
    }
    if(empty($aviso)){
        // verifica se esta recebendo o id do formulario
        // se tiver edita
        // se nao cadastra novo registro
        if(!empty($_GET['id'])){
        $id = (int)$_GET['id'];
        consulta_dados("update links set nome = '$nome', url = '$url', ordem = '$ordem' where id = $id");
    }else{
            consulta_dados("insert into links(nome, url, ordem)
                        values ('$nome','$url','$ordem')");
    }
            header("location: administra-menu.php");
    }
}

// busca itens cadastrados para mostrar na tela
$itensQuery = consulta_dados("select * from links order by ordem asc");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
    <?php include_once 'header.php'; ?>
    <script type="text/javascript">
        function deletar(id){
            if(confirm("Voce tem certeza que quer deletar este registro ?")){
                window.location = "administra-menu.php?acao=deletar&id=" + id;
            }
        }
    </script>
</head>
<body>
    <?php include_once 'menu1.php'; ?>
    
    <?php if(!empty($aviso)): ?>
        <?php print $aviso; ?>
    <?php    endif; ?>
    
  <table>
    <tr>
      <th>Nome do link</th>
      <th>Endereco</th>
      <th>Ordem</th>
      <th>Acoes</th>
    </tr>
    <?php // mostra os registros do banco ?>  
    <?php while($itens = mysqli_fetch_array($itensQuery)): ?>  
        <tr>
            <form action="administra-menu.php" method="get" >
                <input type="hidden" name="id" value="<?php print $itens['id']; ?>"/>
                <td><input type="text" name="nome" value="<?php print $itens['nome']; ?>"/></td>
                <td><input type="text" name="url" value="<?php print $itens['url']; ?>"/></td>
                <td><?php  echo select_ordem($itens['ordem']); ?></td>
                <td>
                    <input type="submit" value="Editar"/>
                    <input type="button"  value="deletar" onclick="deletar(<?php print $itens['id']; ?>)"/>
                </td>
            </form>
        </tr>
    <?php endwhile; ?>
      
      <?php // formulario para cadastro de novo item ?> 
        <tr>
    <form action="administra-menu.php" method="get" >
      <td><input type="text" name="nome" /></td>
      <td><input type="text" name="url" /></td>
      <td><?php  echo select_ordem(); ?></td>
      <td>
          <input type="submit" value="Novo cadastro" />
      </td>
    </form>
        </tr>
  </table>

    <?php include_once 'menu2.php'; ?> 
</body>
</html>

<?php
    }else{
        header("Location: login.php?msg=SemAcesso");
    }    
}else{
        header("Location: login.php?msg=semAcesso");
    }

?>