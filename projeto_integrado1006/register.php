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
$status = $_POST['status_user'];


	//##########################################################################################################
	//********************** 		VALIDANDO A QUANTIDADE DE CADASTROS			********************************
	//##########################################################################################################
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());


// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { //Caso o email exista no banco o usuario será cadastrado

    
	//###############################################################################################
	//********************** 		INSERINDO DADOS 	 			********************************
	//##############################################################################################
	
	
	
	$sql = "INSERT INTO users (nome, sobrenome, email, senha, status_user) " 
            . "VALUES ('$nome','$sobrenome','$email','$senha', 0)";
			

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( clevertechie.com )';
        $message_body = '
        Hello '.$nome.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/login_system/verify.php?email='.$email.'&status='.$status;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}