<?php
class Login{
	public function logar($cnpj,$senha){
		$buscar=mysql_query("SELECT * FROM usuarios WHERE CNPJ='$cnpj' AND senha='$senha' LIMIT 1");
		if (mysql_num_rows($buscar) == 1) {
			$dados=mysql_fetch_array($buscar);
			if($dados["status"] == 1){
        $_SESSION["instituicao"]=$dados["instituicao"];
				$_SESSION["CNPJ"]=$dados["CNPJ"];
				$_SESSION["senha"]=$dados["senha"];
				$_SESSION["nivel"]=$dados["nivel"];
				setcookie("logado",1);
				$log=1;
			}else{
				//Usuário não aprovado
				$flash="<div class=\"message\"><span class=\"e-message animated fadeInDown\">Usuário bloqueado entre em contato com o suporte!</span></div>";
			}
		}
		if (isset($log)) {
			$flash="<div class=\"message\"><span class=\"s-message animated fadeInDown\">Você foi logado com sucesso!</span></div>";
		}else{
			if(empty($flash)){
				//Email ou senha incorretos
				$flash="<div class=\"message\"><span class=\"e-message animated fadeInDown\">Dados incorretos! Tente novamente.</span></div>";
			}
		}
		//Retorno para usuário
		echo $flash;
	}
}

?>
