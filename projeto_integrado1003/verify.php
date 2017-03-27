<?php 
/* Verifies registered user email, the link to this page
   is included in the register.php email message 
*/
require 'db.php';
session_start();

// Make sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['status_user']) && !empty($_GET['status_user']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $status = $mysqli->escape_string($_GET['status_user']); 
    
    // Select user with matching email and hash, who hasn't verified their account yet (active = 0)
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND status_user='0'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "Account has already been activated or the URL is invalid!";

        header("location: error.php");
    }
    else {
        $_SESSION['message'] = "Conta ativada com sucesso!";
        
        // Deixa o usuario ativado com numero 1 (status_user = 1)
        $mysqli->query("UPDATE users SET status_user='1' WHERE email='$email'") or die($mysqli->error);
        $_SESSION['status_user'] = 1;
        
        header("location: success.php");
    }
}
else {
    $_SESSION['message'] = "Invalid parameters provided for account verification!";
    header("location: error.php");
}     
?>