<?php

/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
require 'db.php';
// // Cria uma sesssão para ser usado no arquivo profile.php
$_SESSION['email'] = $_POST['email'];
$_SESSION['nome'] = $_POST['nome'];
$_SESSION['sobrenome'] = $_POST['sobrenome'];



//###############################################################################################
	//********************** RECEBENDO VARIAVEIS	E Variaves que protegem de SQL injection ********************************
	//##############################################################################################
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$status = 1;


	//##########################################################################################################
	//********************** 		VALIDANDO A QUANTIDADE DE CADASTROS			********************************
	//##########################################################################################################
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());


// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'Email já existe!!';
    header("location: error.php");
    
}
else { //Caso o email exista no banco o usuario será cadastrado

    
	//###############################################################################################
	//********************** 		INSERINDO DADOS 	 			********************************
	//##############################################################################################
	
	
	
	$sql = "INSERT INTO users (nome, sobrenome, email, senha, status_user) " 
            . "VALUES ('$nome','$sobrenome','$email','$senha', 0)";
			

    // Mensagem para o usuario ativar a conta
    if ( $mysqli->query($sql) ){

        $_SESSION['logged_in'] = true; // deixa a sessao com logado
        $_SESSION['message'] =
                
                 "Verifique o email de $email, clique no link enviado para seu email para ativar
				 sua conta!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( clevertechie.com )';
        $message_body = '
        Hello '.$nome.',

        Thank you for signing up!

        Por favor clique nesse link

        http://localhost:9090/projeto_integrado1006/verify.php?email='.$email.'&status='.$status;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Falha no registro!';
        header("location: error.php");
    }

}