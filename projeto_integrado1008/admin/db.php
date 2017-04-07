<?php
	//###############################################################################################
	//********************** 		CONEXÃO COM O BANCO 			********************************
	//##############################################################################################

	$host = "localhost";
	$user = "root";
	$pass = "";
	$banco = "base";
	$conexao = mysqli_connect($host, $user, $pass) or die (mysql_error());
	mysqli_select_db($conexao, $banco) or die (mysql_error());	
	$mysqli = new mysqli("localhost", "root", "", "base");
?>