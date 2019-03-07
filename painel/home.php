<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Área do cliente | Sistema de Gerenciamento de Notas</title>
    <link rel="stylesheet" href="css/foundation.min.css"/>
    <link rel="stylesheet" href="css/painel.css"/>
    <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/jquery.maskedinput-1.1.4.pack.js"></script>
    <script src="js/application.js"></script>
    <script src="js/vendor/modernizr.js"></script>
</head>
<body>
    <div class="message">
      <?php echo $msg;?>
    </div>
    <?php
      if ($nivel == 2){ ?>
      <!-- Se  o usuário for o Administrativo então será mostrado o cconteúdo a seguir -->
      <nav class="admin-menu">
          <ul>
              <li class="ni">
                <a href=""><i class="fa fa-home fa-2x"></i></a>
                <span>Home</span>
              </li>
              <li class="ni">
                <a href=""><i class="fa fa-upload fa-2x"></i></a>
                <span>Upload</span>
              </li>
              <li class="ni">
                <a href=""><i class="fa fa-users fa-2x"></i></a>
                <span>Usuários</span>
              </li>
              <li class="ni">
                <a href=""><i class="fa fa-trash fa-2x"></i></a>
                <span>Excluir Nota</span>
              </li>
              <li class="ni">
                <a href=""><i class="fa fa-cog fa-2x"></i></a>
                <span>Configurações</span>
              </li>
               <li class="">
                <a href="register.php"><i class="fa fa-edit fa-2x"></i></a>
                <span>Cadastrar</span>
              </li>
              <li class="" id="logout">
                <a href="?acao=logout"><i class="fa fa-sign-out fa-2x"></i></a>
                <span>Sair</span>
              </li>
          </ul>
      </nav>
      <div class="row">
      	<div class="small-12 small-centered column">
          <section class="tab-content">
            <h2>Bem Vindo</h2>
            <h3><?php echo $_SESSION['instituicao']; ?></h3>
          </section>
      		<section class="tab-content">
            <div class="row">
              <form class="small-5 column small-centered" action="?acao=upload" method="post" enctype="multipart/form-data">
  							<span><i class="fa fa-list-alt"></i><input name="cnpj" class="cnpj" type="text" placeholder="Digite o CNPJ"></span>
  							<input type="file" name="file" multiple value="Adicionar Notas">
                <input type="submit" name="name" value="Enviar">
                <div class="clearfix"></div>
  						</form>
            </div>
      		</section>
          <section class="tab-content">
            <div class="row">
              <table class="small-12 column" border="0">
                <tr>
                  <th>CNPJ</th>
                  <th>Instituição</th>
                  <th>Status</th>
                  <th>E-mail</th>
                </tr>
              <?php
                  $buscarusuarios=mysql_query("SELECT * FROM usuarios WHERE nivel='1'");
                    if(mysql_num_rows($buscarusuarios) == 0){
                      echo"Nenhum usuário cadastrado no sistema!";
                    }else{
                      while($linha=mysql_fetch_array($buscarusuarios)){
              ?>                    <tr>
                          <td><?php echo $linha["CNPJ"];?></td>
                            <td><?php echo $linha["instituicao"];?></td>
                            <td><?php $id=$linha["id"]; if($linha["status"] == 0){ echo "<a class=\"user-block\" href=\"index.php?acao=aprovar&amp;id=$id\">Inativo</a>";}else{echo"<a class=\"user-active\" href=\"index.php?acao=bloquear&amp;id=$id\">Ativo</a>";}?></td>
                            <td><?php echo $linha["email"];?></td>
                        </tr>
              <?php                }
                    }
              ?>
              </table>
            </div>
          </section>
          <section class="tab-content">
            <div class="row">
              <form class="small-5 column small-centered" action="?acao=delete" method="post">
  							<span><i class="fa fa-list-alt"></i><input name="cnpj" class="cnpj" type="text" placeholder="Digite o CNPJ"></span>
                <span><i class="fa fa-file"></i><input name="arquivo" class="" type="text" placeholder="Digite o nome do arquivo"></span>
                <input type="submit" name="name" value="Apagar">
                <i>Ex: nota.pdf</i>
                <div class="clearfix"></div>
  						</form>
            </div>
          </section>
      	</div>
      </div>
      <!-- Fim do conteúdo para usuário Administrativo -->
    <?php }else{ ?>
    <!-- Se o usuário não for Administrativo será mostrado o conteúdo a seguir -->
    <nav class="user-menu">
        <ul>
            <li class="ni"><a href=""><i class="fa fa-home fa-2x"></i></a><span>Ínicio</span></li>
            <li class="ni"><a href=""><i class="fa fa-file-pdf-o fa-2x"></i></a><span>Arquivos</span></li>
            <li class="ni"><a href=""><i class="fa fa-cog fa-2x"></i></a><span>Configurações</span></li>
            <li id="logout"><a href="?acao=logout"><i class="fa fa-sign-out fa-2x"></i></a><span>Sair</span></li>
        </ul>
    </nav>
    <div class="row">
      <div class="small-8 small-centered column">
        <section class="tab-content">
          <h2>Bem Vindo</h2>
          <h3><?php echo $_SESSION['instituicao']; ?></h3>
        </section>
        <section class="tab-content">
          <h2>Arquivos disponíveis</h2>
          <?php
            header('Content-Type: text/html; charset=utf-8');
            $cnpj_folder = preg_replace('#[^0-9]#', '', $_SESSION['CNPJ']);
            $path = "files/$cnpj_folder/";
            $dir = dir($path);
            while($arquivo = $dir -> read()){
              $file_name = explode('.', $arquivo);
  						$file_name = strtolower(reset($file_name));
              echo "
                <a target=\"_blank\" class=\"file\" href='".$path.$arquivo."'><i data-tooltip aria-haspopup=\"true\" class=\"fa fa-file-pdf-o fa-5x has-tip [tip-bottom] [radius]\" title='".$arquivo."'><span>".$file_name."</span></i></a>
              ";
            }
          ?>
        </section>
      </div>
    </div>
    <!-- Fim do conteúdo para usuário comum -->
    <?php } ?>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>
