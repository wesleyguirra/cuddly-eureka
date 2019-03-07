<?php
class Cadastro{
	public function cadastrar($cnpj,$instituicao,$tel,$email,$senha){
		//Tratamento de váriaveis
		$cnpj         =ucwords(strtolower($cnpj));
		$instituicao  =ucwords(strtolower($instituicao));
		$tel          =ucwords(strtolower($tel));
		$senha        =sha1($senha)."filer";
		$folder				=preg_replace('#[^0-9]#', '', $cnpj);

		//Inserção no banco de dados
		$procuracnpj=mysql_query("SELECT * FROM usuarios WHERE CNPJ='$cnpj'");
		$verificacnpj=mysql_num_rows($procuracnpj);
		if ($verificacnpj == 0) {
			$insert=mysql_query("INSERT INTO usuarios(CNPJ,instituicao,tel,email,senha,nivel,status,file_path) VALUES('$cnpj','$instituicao','$tel','$email','$senha',1,1,'files/$folder')");
		}else{
			$flash="<div class=\"message\"><span class=\"a-message animated fadeInDown\">Já existe um usuário utilizando este CNPJ.</span></div>";
		}
			if (isset($insert)){
				$flash="<div class=\"message\"><span class=\"s-message animated fadeInDown\">Cadastro Realizado com sucesso!</span></div>";
			}else{
				if(empty($flash)) {
					$flash="<div class=\"message\"><span class=\"e-message animated fadeInDown\">Ops aconteceu algo inesperado tente novamente em alguns minutos...</span></div>";
				}
			}

		//Retorno para usuário
		echo $flash;
	}
}
?>
