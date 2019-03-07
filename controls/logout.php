<?php

if ($startaction == 1){
	if ($acao == "logout"){
		setcookie("logado","");
		unset($_SESSION["email"],$_SESSION["senha"],$_SESSION["nivel"]);
		$msg ="<span class=\"e-message animated fadeInDown\">Você foi deslogado.</span>";
	}
}

?>
