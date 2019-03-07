<?php

if ($startaction == 1){
	if ($acao == "upload"){
		if ($nivel == 2) {
			if (isset($_POST["cnpj"])) {
				$cnpj=$_POST['cnpj'];
				$cnpj_folder = preg_replace('#[^0-9]#', '', $cnpj);

				// Pasta do usuário
				$path = "files/$cnpj_folder/";

				$procuracnpj=mysql_query("SELECT * FROM usuarios WHERE CNPJ='$cnpj'");
				$verificacnpj=mysql_num_rows($procuracnpj);
				if ($verificacnpj == 0) {
					$msg="<span class=\"a-message animated fadeInDown\">O CNPJ inserido Não está cadastrado.</span>";
				} else {
					// Caso a pasta do usuário não exista então ela será criada
					if (!file_exists($path)) {
						mkdir("$path");
					}

					if (isset($_FILES['file'])) {
						$file = $_FILES['file'];
						// Propriedades do Arquivo
						$file_name = $file['name'];
						$file_tmp = $file['tmp_name'];
						$file_size = $file['size'];
						$file_error = $file['error'];

						// Trabalhando a extensão do arquivo
						$file_ext = explode('.', $file_name);
						$file_ext = strtolower(end($file_ext));

						//Extensões permitidas
						$allowed = array('pdf', 'xml');

						// Caso a extensão seja uma extensão permitida será executado o seguinte código
						if (in_array($file_ext, $allowed)) {
							// Se não houver erros no arquivo enviado será executado o seguinte código
							if ($file_error == 0) {
								// Se o tamanho for menor que 5 Megabytes será executado o seguinte código
								if ($file_size <= 5242880) {
									$file_destination = "$path$file_name";
									// Caso o arquivo já exista no servidor será executado o seguinte código
									if (file_exists($file_destination)) {
										$msg="<span class=\"a-message animated fadeInDown\">A Nota já existe.</span>";
										// O arquivo não existe no servidor
									} else {
										move_uploaded_file($file_tmp, $file_destination);
										$msg="<span class=\"s-message animated fadeInDown\">A Nota foi adicionada!</span>";
									}
									// O Arquivo é maior do que 5 Megabytes
								} else {
									$msg="<span class=\"a-message animated fadeInDown\">O arquivo deve ser menor do que 5MB.</span>";
								}
								// O Arquivo possui erros
							} else {
								$msg="<span class=\"a-message animated fadeInDown\">Ocorreu um problema ao enviar o arquivo. Tente novamente.</span>";
							}
							// O Tipo de arquivo não é permitido
						} else {
							$msg="<span class=\"e-message animated bounce\">Este tipo de arquivo não é suportado.</span>";
						}
					}
				}
			}
		}
	}
}

?>
