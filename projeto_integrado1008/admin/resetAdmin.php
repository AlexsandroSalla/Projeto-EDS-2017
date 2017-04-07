<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require 'db.php';
session_start();

// Verifica se o email e o status do usuario est�o sem valor.
if(isset($_SESSION['email']))
{
    $email = $mysqli->escape_string($_SESSION['email']); 
	$status = 2;
	
    // Procura se o email existe 
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND status_user='$status'");
	// Caso a quantidade de linhas do resultad do select seja 0
    if ( $result->num_rows == 0 )
    { 
		$_SESSION['message'] = "Conta n�o e de administrador!";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "Desculpe, Falha na verifica��o, tente novamente!";
    header("location: error.php");  
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Resetar a senha</title>
  <link rel="stylesheet" href="../css/style.css"/>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="form">

          <h1>Escolha sua nova senha</h1>
          <!-- � enviado via post a nova senha para o arquivo reset_password.php -->
          <form action="../reset_password.php" method="post">
              
          <div class="field-wrap">
            <label>
              Nova senha<span class="req">*</span>
            </label>
            <input type="password"required name="newpassword" autocomplete="off"/>
          </div>
              
          <div class="field-wrap">
            <label>
              Confirmar nova senha<span class="req">*</span>
            </label>
            <input type="password"required name="confirmpassword" autocomplete="off"/>
          </div>
          
          <!--Mostra o email do usuario -->
          <input type="hidden" name="email" value="<?= $email ?>">    
          <input type="hidden" name="hash" value="<?= $status ?>">      
          <button class="button button-block"/>Mudar</button>
          
          </form>

    </div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
