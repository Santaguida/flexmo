<?php

$sucesso = false;

if (isset($_POST['nota_1'])){

$nota_1 = str_replace(',', '.', $_POST['nota_1']);
$nota_2 = str_replace(',', '.', $_POST['nota_2']);
$nota_3 = str_replace(',', '.', $_POST['nota_3']);
$nota_4 = str_replace(',', '.', $_POST['nota_4']);

$media = ($nota_1 * 0.1) + ($nota_2 * 0.2) + ($nota_3 * 0.3) + ($nota_4 * 0.4);
$media_2 = ($nota_3 * 0.3) + ($nota_4 * 0.4);

if($media >= 7 || $media >= 6 && $nota_4 >= 8 || $media >= 5 && $media_2 >= 8){
	$final = 'Aprovado';
}else{
	$final = 'Reprovado';	
}
echo 'Sua media eh ' . number_format($media, 1,',','.') . ' e voce esta ' . $final . '<br><br><a href="exercicio-1.php">Voltar </a>';

$sucesso = true;

}
?>

<?php if (!$sucesso){ ?>
	
<title>Documento sem título</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p>Calculando a nota media</p>
<form id="form1" name="form1" method="post" action="exercicio-1.php">
  <p>Nota 1 = <span id="sprytextfield1">
    <label for="nota_8"></label>
    <input name="nota_1" type="text" id="nota_8" size="3" maxlength="3" />
    <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo necessário.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span></span></p>
  <p>Nota 2 =
    <label for="nota_9"></label>
<span id="sprytextfield2">
      <label for="nota_10"></label>
      <input name="nota_2" type="text" id="nota_10" size="3" maxlength="3" />
      <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo necessário.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span></span><span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo necessário.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span></p>
  <p>Nota 3 =
    <label for="nota_15"></label>
    <span id="sprytextfield3">
    <label for="nota_16"></label>
    <input name="nota_3" type="text" id="nota_16" size="3" maxlength="3" />
  <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo necessário.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span></span><span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo necessário.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span></p>
  <p>Nota 4 =
    <label for="nota_17"></label>
    <span id="sprytextfield4">
    <label for="nota_18"></label>
    <input name="nota_4" type="text" id="nota_18" size="3" maxlength="3" />
  <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo necessário.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span></span><span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo necessário.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span></p>
  <p>
    <input type="submit" name="enviar" id="enviar" value="Calcular" />
  </p>
</form>

<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {minValue:0, maxValue:10});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {minValue:0, maxValue:10, useCharacterMasking:true});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {minValue:0, maxValue:10});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "real", {minValue:0, maxValue:10});
</script>
</body>
</html>
<?php } ?>