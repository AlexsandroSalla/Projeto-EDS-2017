<?php

/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// // Cria uma sesssão para ser usado no arquivo profile.php
$_SESSION['email'] = $_POST['email'];
$_SESSION['nome'] = $_POST['nome'];
$_SESSION['sobrenome'] = $_POST['sobrenome'];
$_SESSION['status_user'] = $_POST['status_user'];


//###############################################################################################
	//********************** RECEBENDO VARIAVEIS	E Variaves que protegem de SQL injection ********************************
	//##############################################################################################
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];



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
			
			

    // Ignorar o que tem abaixo.
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "O link foi enviar para o email $email, Por favor Verifique
                 sua conta clicando no link da mensagem!";

        // Send registration confirmation link (verify.php)
      /*  $to      = $email;
        $subject = 'Conta foi verificada ( na loja.com )';
        $message_body = '
        Hello '.$nome.',

        Obrigado por se registrar-se!

        Por favor, clique no link para ativar sua conta!:

        http://localhost:9090/projeto_integrado1003/verify.php?email='.$email.'&status_user='.$status;  

        mail( $to, $subject, $message_body); */
		
	// Abaixo é um teste de envio EMail.
	
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$Mailer = new PHPMailer();
	
	//Define que será usado SMTP
	$Mailer->IsSMTP();
	
	//Enviar e-mail em HTML
	$Mailer->isHTML(true);
	
	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';
	
	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl';
	
	//nome do servidor
	$Mailer->Host = 'http://localhost:9090';
	//Porta de saida de e-mail 
	$Mailer->Port = 465;
	
	//Dados do e-mail de saida - autenticação
	$Mailer->Username = 'cristiantfreitas@gmail.com';
	$Mailer->Password = '194979396959';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = 'mail.google.com';
	
	//Nome do Remetente
	$Mailer->FromName = '$nome';
	
	//Assunto da mensagem
	$Mailer->Subject = 'Confirme sua Inscrição';
	
	//Corpo da Mensagem
	$mensagem = "Olá <br>";
	$mensagem .= "Confirme seu e-mail para receber o material! <br> <br>";
	$mensagem .= "Clique aqui para confirmar seu e-mail Por favor, clique no link para ativar sua conta!";
	$mensagem .= "http://localhost:9090/projeto_integrado1003/verify.php?email='.$email.'&status_user='.$status; <br> <br>";
	$mensagem .= "Se você recebeu este e-mail por engano, simplesmente o exclua.<br> <br>";
	$mensagem .= "$nome";
	
	$Mailer->Body = '$mensagem';
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = 'conteudo do E-mail em texto';
	
	//Destinatario 
	$Mailer->AddAddress('cristiantfreitas@gmail.com');
	
	if($Mailer->Send()){
		echo "E-mail enviado com sucesso";
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}
	
		
		
        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}