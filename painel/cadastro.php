<!DOCTYPE html>
<html>
<head>
    <title>Cadastro | Sistema de Gerenciamento de Notas</title>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/jquery.maskedinput-1.1.4.pack.js"></script>
    <script src="js/application.js"></script>
</head>
<body>
    <div class="message">
      <?php echo $msg;?>
    </div>
    <div class="login">
        <form class="" action="?acao=cadastrar" method="post">
           <img src="img/logo.png" alt="AOC - Sistema de Gerenciamento de Notas">
           <span><i class="fa fa-list-alt"></i><input name="cnpj" class="cnpj" type="text" placeholder="Digite o CNPJ"></span>
           <span><i class="fa fa-institution"></i><input name="instituicao" class="" type="text" placeholder="Digite o nome da instituição"></span>
           <span><i class="fa fa-phone"></i><input name="tel" class="tel" type="tel" placeholder="Telefone para contato"></span>
           <span><i class="fa fa-envelope"></i><input name="email" class="" type="text" placeholder="Digite o e-mail"></span>
           <span><i class="fa fa-key"></i><input name="senha" class="" type="password" placeholder="Digite a senha"></span>
           <input name="ok" type="submit" value="Cadastrar" class="login-form-button">
           <a href="index.php">Voltar</a>
           <div class="clearfix"></div>
        </form>
    </div>
</body>
</html>
