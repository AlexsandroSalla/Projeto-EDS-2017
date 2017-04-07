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
        header("location: .../error.php");
    }
    else { // Usuario existe caso a quantidade de linhas seja diferente de 0

        $user = $result->fetch_assoc(); // $user becomes array with user data
        $email = $user['email'];
		$_SESSION['email'] = $user['email'];
		header("location: resetAdmin.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Esqueci a senha</title>
    <link rel="stylesheet" href="../css/style.css"/>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
</head>
<body>
    
  <div class="form">

    <h1>Resetar senha</h1>

    <form action="forgotADM.php" method="post">
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
