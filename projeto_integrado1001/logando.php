<!DOCTYPE html>
<html>
<head>
	<title>Entrada</title>
	<script type="text/javascript" src="js/cadastro.js"></script>
</head>
<body>

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
?>

<?php
	
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$sql = mysqli_query($conexao,"SELECT * FROM users WHERE email = '$email' and senha = '$senha'") or die(mysql_error());
	$verifica = mysqli_num_rows($sql);
	
	if($verifica > 0){
			session_start();
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['senha'] = $_POST['senha'];
			echo "Usuário autenticado com sucesso";
			echo "<script>loginsuccess()</script>";

	} else {
		echo "Usuário ou senha não encontrado";
		echo "<script>loginfail()</script>";
	}



?>




</body>
</html>



