<!DOCTYPE html>
<html>
<head>
	<title>Cadastrando</title>
<script type="text/javascript" src = "js/cadastro.js"></script>
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

	//##########################################################################################################
	//********************** 		VALIDANDO A QUANTIDADE DE CADASTROS			********************************
	//##########################################################################################################
	$conta = mysqli_query($conexao,"SELECT COUNT(id_users) FROM users GROUP BY id_users ");
?>


<?php

	//###############################################################################################
	//********************** 		RECEBENDO VARIAVEIS				********************************
	//##############################################################################################

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];


				if($nome == "" || $sobrenome == "" || $email == "" || $senha == ""){
					echo "Preencha todos os campos obrigatórios";
					echo "<script>loginfail()</script>";
				} else {


	//###############################################################################################
	//********************** 		INSERINDO DADOS 	 			********************************
	//##############################################################################################


	$sql = mysqli_query($conexao,"INSERT INTO users(nome, sobrenome, email, senha, status_user)values('$nome', '$sobrenome', '$email', '$senha', 1)");

	//###############################################################################################
	//********************** 		VALIDANDO O PROCESSO			********************************
	//##############################################################################################

	$confere = mysqli_query($conexao,"SELECT COUNT(id_users) FROM users GROUP BY id_users ");

	$comeco = mysqli_num_rows($conta);
	$final = mysqli_num_rows($confere);


	//###############################################################################################
	//********************** 		EXIBE E REDIRECIONA				********************************
	//##############################################################################################

	if ($final  > $comeco){
		echo "<center><h1> Cadastrado com Sucesso </h1> </center>";
		echo "<script>loginsuccess()</script>";	
	}

	else{
		echo "<center> <h1> Ocorreu um problema </center> </h1>";
		echo "<script>loginfail()</script>";		
	}
		 
	mysqli_close($conexao);
}

?>

</body>
</html>



