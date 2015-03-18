<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User registration</title>
    <?php include_once 'header.php'; ?>
</head>
<body>      
    <?php include_once 'menu1.php'; ?>
        <div class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <h3 class="widget-title">Cadastro de usuário</h3>
                        <h5 class="text-danger">Todos os campos são obrigatórios</h5>
                        <div class="contact-form">
                            <form name="contactform" id="contactform" action="#" method="post">
                                <p>
                                    <input name="primeiroNome" type="text" id="primeiroNome" placeholder="Digite seu nome" autofocus required>
                                </p>
                                <p>
                                    <input name="sobrenome" type="text" id="sobrenome" placeholder="Sobrenome" required>
                                </p>
                                <p>
                                    <input name="ramal" type="text" id="ramal" placeholder="Ramal (4 digitos)" required>
                                </p>
                                <p>
                                    <input name="matricula" type="text" id="matricula" placeholder="Matrícula" required>
                                </p>
                                <p>
                                    <input name="badge" type="text" id="badge" placeholder="Badge">
                                </p>
                                <p>
                                    <input name="telefone" type="text" id="telefone" placeholder="Telefone residencial: (XX) XXXX-XXXX" required>
                                </p>
                                <p>
                                    <input name="cel" type="text" id="cel" placeholder="Celular: (xx) 9XXXX-XXXX" required>
                                </p>
                                <p>
                                    <input name="email" type="email" id="email" placeholder="Seu E-mail (Preferência @flextronics.com)" required> 
                                </p>
                                <p>
                                    <input name="confirmaEmail" type="email" id="confirmaEmail" placeholder="Confirme seu e-mail" required> 
                                </p>
                                <p>
                                    <input name="endereco" type="text" id="endereco" placeholder="Endereço (Rua XXXX, 123)" required>
                                </p>
                                <p>
                                    <input name="bairro" type="text" id="bairro" placeholder="Bairro" required>
                                </p>
                                <p>
                                    <input name="cidade" type="text" id="cidade" placeholder="Cidade / Estado (Ex.Sorocaba-SP)" required>
                                </p>
                                <p>
                                    <input name="senha" type="password" id="senha" placeholder="Senha (Mínimo de 6 caracteres)" required> 
                                </p>
                                <p>
                                    <input name="confirmaSenha" type="password" id="confirmaSenha" placeholder="Confirme sua senha" required> 
                                </p>
                                <p>
                                    <select name="select" id="select" >
                                        <option value="informe" selected>Informe sua função</option>
                                        <option value="supervisor">Supervisor</option>
                                        <option value="coordenadorTecnico">Coordenador técnico</option>
                                        <option value="coordenadorProducao">Coordenador de produção</option>
                                        <option value="engenheiro">Engenheiro</option>
                                        <option value="tecnico">Técnico</option>
                                        <option value="quickrepair">Quick Repair</option>
                                    </select>
                                    <select name="select2" id="select2" >
                                        <option value="informe" selected>Informe seu turno</option>
                                        <option value="1">1T</option>
                                        <option value="2">2T</option>
                                        <option value="3">3T</option>
                                        <option value="4">ADM</option>                            
                                    </select>
                                <p/>
                                <p>
                                    <h5 class="text-danger">Todos os dados serão verificados pelo administrador</h5>
                                <p/>	
                                <p>
                                    <input type="submit" class="mainBtn" id="submit" value="Cadastrar" onclick="alert('O acesso será liberado após verificação ! Caso demore mais que 48 horas, entre em contato com o administrador')">
                                </p>                            
                            </form>
                        </div> <!-- /.contact-form -->
                    </div>                
                </div>
            </div>
</div> <!-- /.content-section -->
    <?php include_once 'menu2.php'; ?>             
</body>
</html>

