<?php

$dados_pessoais = array(
                        'nome' => 'Fernando',
                        'sobrenome' => 'Santaguida',
                        'sexo' => 'masculino',
                        'email' => 'santaguidafernando@gmail.com'
                );

echo '<pre>';
print_r($dados_pessoais);
echo '</pre>';

echo '<br><hr><br>';

echo $dados_pessoais['nome'];