<?php 
/* Resetar a senha, é enviado um link pra trocar senha*/
require 'db.php';
session_start();

// Chega se a pagina foi redirencionado pela metodo post do formulario da pagina forgot.php
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "Email digitado não existe!!";
        header("location: error.php");
    }
    else { // Usuario existe caso a quantidade de linhas seja diferente de 0

        $user = $result->fetch_assoc(); // $user becomes array with user data
        
        $email = $user['email'];
        $status = $user['status_user'];
        $nome = $user['nome'];
		  // Cria uma sessão com a message para mostrar o arquivo sucess.php
       
        $_SESSION['message'] = "<p>Por favor, cheque seu email <span>$email</span>"
        . " Para a confirmação de alteração de senha ser completada!!</p>";

        // E enviado um link pra ativão pro arquivo (reset.php)
        $to      = $email;
        $subject = 'Password Reset Link ( clevertechie.com )';
        $message_body = '
        Ola '.$nome.',

        You have requested password reset!

        Por favor clique no link abaixo para trocar senha!

        http://localhost:9090/projeto_integrado1003/reset.php?email='.$email.'&status='.$status;  

        mail($to, $subject, $message_body);

        header("location: success.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Esqueci a senha</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
    
  <div class="form">

    <h1>Resetar senha</h1>

    <form action="forgot.php" method="post">
     <div class="field-wrap">
      <label>
        Email <span class="req">*</span>
      </label>
      <input type="email"required autocomplete="off" name="email"/>
    </div>
    <button class="button button-block"/>Mudar</button>
    </form>
  </div>
          
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>

</html>
