<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>
    <label for="line">Line</label>
    <input type="text" name="line" id="line" />
    <label for="nRow">Station matrix</label>
    <input type="text" name="nRow" id="nRow" />
X
<label for="nCol"></label>
<input type="text" name="nCol" id="nCol" />
<input type="submit" id="submit" value="Salvar">
  </p>
</form>
<table width="100%" height="600" border="1">
    
	<?php
    	$nRow = $_POST['nRow'];
        $nCol = $_POST['nCol'];
    	$content =  '';
        $matrix =   '';
    	$tdIn =     '<td>';
        $tdOut =    '</td>';
        $trIn =     '<tr>';
        $trOut =    '</tr>';
        
        for($i = 1; $i <= $nRow; $i++){
            $matrix .= $trOut . $trIn;
            for($j = 1; $j <= $nCol; $j++){
                $matrix .= $tdOut . $tdIn;                
            }
        }        
        
        echo $matrix;
        
    ?>
    </tr>
</table>
</body>
</html>
