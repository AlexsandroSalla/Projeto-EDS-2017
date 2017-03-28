<?php
/* Processo de alteraчуo de senha */
require 'db.php';
session_start();

// Verifica se esta recebendo via post do formulario anterior"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Make sure the two passwords match
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

        $new_password = $_POST['newpassword'];
        
        // Nos pegamos as novas senha do formulario reset.php 
	
	
		 $email = $mysqli->escape_string($_POST['email']);
        
        // abaixo e pra enviar o codigo para recuperar senha
        $sql = "UPDATE users SET senha='$new_password' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "Sua senha foi trocada com sucesso!";
        header("location: success.php");    

        }

    }
    else {
        $_SESSION['message'] = "Senha digitada incorretamente, verifique se igualdade entre as senhas!";
        header("location: error.php");    
    }

}
?>