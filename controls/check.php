<?php

if (isset($_SESSION["CNPJ"]) && isset($_SESSION["senha"])) {
	$logado=1;
	$nivel=$_SESSION["nivel"];
}

?>