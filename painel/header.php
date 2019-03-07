<?php
//Global
include("global.php");

//Includes das classes
include("classes/DB.class.php");
include("classes/Cadastro.class.php");
include("classes/Login.class.php");

//Conexão com banco de dados
$conectar=new DB;
$conectar=$conectar->conectar();

// Includes de controle
include("controls/register.php");
include("controls/login.php");
include("controls/logout.php");
include("controls/check.php");
include("controls/allow.php");
include("controls/block.php");
include("controls/upload.php");
include("controls/delete.php");
?>
