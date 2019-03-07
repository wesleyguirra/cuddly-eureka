<?php

if ($startaction == 1){
	if ($acao == "delete"){
		if ($nivel == 2) {
			if (isset($_POST['cnpj'])) {
				$cnpj=$_POST['cnpj'];
				$file_name = $_POST['arquivo'];
				$cnpj_folder = preg_replace('#[^0-9]#', '', $cnpj);

				// Pasta do usuário
				$path = "files/$cnpj_folder/";

				$procuracnpj=mysql_query("SELECT * FROM usuarios WHERE CNPJ='$cnpj'");
				$verificacnpj=mysql_num_rows($procuracnpj);
				if ($verificacnpj == 0) {
					$msg="<span class=\"a-message animated fadeInDown\">O CNPJ inserido Não está cadastrado.</span>";
				} else {
					$file_destination = "$path$file_name";
					if (file_exists($file_destination)) {
						if (unlink($file_destination)) {
							$msg="<span class=\"s-message animated fadeInDown\">O Arquivo foi apagado.</span>";
						} else {
							$msg="<span class=\"a-message animated fadeInDown\">Ocorreu um erro e o arquivo não foi apagado.</span>";
						}
					} else {
						$msg="<span class=\"e-message animated fadeInDown\">O Arquivo não existe.</span>";
					}
				}
			}
		}
	}
}

?>
