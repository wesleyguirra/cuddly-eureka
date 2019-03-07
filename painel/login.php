<!DOCTYPE html>
<html>
<head>
    <title>Login | Sistema de Gerenciamento de Notas</title>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/jquery.maskedinput-1.1.4.pack.js"></script>
    <script src="js/application.js"></script>
</head>
<body>
<div class="message">
        <?php echo $msg; ?>
</div>
	<div class="login">
            <form class="" action="?acao=logar" method="post">
               <img src="img/logo.png" alt="Virtus Rastreamento">
                <span><i class="fa fa-list-alt"></i><input name="cnpj" class="cnpj" type="text" placeholder="CNPJ" required></span>
                <span><i class="fa fa-key"></i><input name="senha" class="" type="password" placeholder="Senha" required></span>
                <input name="ok" type="submit" value="Login" class="login-form-button">
                <a href="register.php" style="display:none;">Registrar-se</a>
                <div class="clearfix"></div>
            </form>
        </div>
</body>
</html>
