<?php
session_start();
ob_start();
	include("includes/header.php");
	if (isset($logado)) {
		include("painel/home.php");
	}else{
		include("painel/login.php");
	}
?>