<?php
	class DB{
		public function conectar(){
			$host="localhost";
			$user="root";
			$pass="root";
			$dbname="filer";

			$conexao=mysql_connect($host,$user,$pass);
			$selectdb=mysql_select_db($dbname);
			$selectcharset=mysql_set_charset('utf8');

			return $conexao;
		}
	}
?>
