<?php 
/* Verifies registered user email, the link to this page
   is included in the register.php email message 
*/
require 'db.php';
session_start();

// Verifica se o email e status estao com algum valor
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['status']) && !empty($_GET['status']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $status = $mysqli->escape_string($_GET['status']); 
    
    // Seleciona o status user, se o status_user for igual a 0 ele não vai trazer nenhuma linha e vai ativar a conta
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND status_user='1'");

    if ( $result->num_rows == 1)
    { 
        $_SESSION['message'] = "A Conta ja esta ativada ou nao existe";

        header("location: error.php");
    }
    else {
        $_SESSION['message'] = "Conta ativada com sucesso!";
        
        // Deixa o usuario ativado com numero 1 (status_user = 1)
        $mysqli->query("UPDATE users SET status_user='1' WHERE email='$email'") or die($mysqli->error);
		// adicionar 1 no status_user para o usuario poder logar
        $_SESSION['status_user'] = 1;
        unset($_SESSION['message']);
        header("location: success.php");
		
    }
}
else {
    $_SESSION['message'] = "Parametros incorreto, tente ativar novamente!!";
    header("location: error.php");
}     
?>