<?php
if ($startaction == 1){
	if ($acao == "logar"){
		//Dados
		$cnpj=addslashes($_POST['cnpj']);
		$senha=sha1($_POST['senha'])."filer";

		if (empty($cnpj) || empty($senha)) {
			$msg="<span class=\"e-message\">Preencha todos os campos!</span>";
		}else{
            //Executa a busca pelo usuário
            $login= new Login;
            echo
            $login=$login->logar($cnpj,$senha);
		}
	}
}
?>