<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email' and status_user=1");


if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "Email digitado não existe!! ou a conta não foi verificada!";
    header("location: error.php");
}
else { // Email existente
    $user = $result->fetch_assoc();
    if ($user['status_user'] != 0) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['sobrenome'] = $user['sobrenome'];
        $_SESSION['status_user'] = $user['status_user'];
        
        // Usuario logado
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
   }
 else {
        $_SESSION['message'] = "Dados incorreto! Tente novamente.";
		  header("location: error.php");
		/adicionar aqui um count de tentativas, acima de 5 tentativas o status_user vira 0
	}
}

