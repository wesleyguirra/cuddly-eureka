<?php

if ($startaction == 1){
	if ($acao == "bloquear"){
		if ($nivel == 2) {
			if (isset($_GET["id"])) {
				$id=$_GET["id"];
				$query=mysql_query("UPDATE usuarios SET status='0' WHERE ID='$id'");
				$msg ="<span class=\"e-message animated fadeInDown\">O usuário foi desativado.</span>";
			}
		}
	}
}

?>
