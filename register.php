<?php
  include("includes/header.php");
  if ($nivel = 2) {
    include("painel/cadastro.php");
  }else{
    include("painel/home.php");
  }
?>