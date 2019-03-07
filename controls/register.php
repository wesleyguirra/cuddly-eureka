<?php
if ($startaction == 1){
	if ($acao == "cadastrar"){
		$cnpj         =$_POST["cnpj"];
		$instituicao  =$_POST["instituicao"];
		$tel          =$_POST["tel"];
		$email        =$_POST["email"];
		$senha        =$_POST["senha"];
		$folder 			= preg_replace('#[^0-9]#', '', $cnpj);

		if (empty($cnpj) || empty($instituicao) || empty($tel) || empty($email) || empty($senha)){
			$msg="<span class=\"e-message animated fadeInDown\">Preencha todos os campos!</span>";
		}else{
			//Email válido
			if (filter_var($email,FILTER_VALIDATE_EMAIL)){
				//Senha inválida
				if (strlen($senha)<8){
					$msg="<span class=\"a-message animated fadeInDown\">Senha deve conter no minímo oito caracteres!</span>";
				}
				//Senha válida
				else{
					//Executa a classe cadastro
					$conectar=new Cadastro;
					echo $conectar=$conectar->cadastrar($cnpj,$instituicao,$tel,$email,$senha,$folder);
				}
			}
			//Email inválido
			else{
				$msg="<span class=\"a-message animated fadeInDown\">Formato de email inválido!</span>";
			}
		}
	}
}
?>
