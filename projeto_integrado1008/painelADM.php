<?php
/* Displays user information and some useful messages */
session_start();
require 'db.php';
// Verifica se a Sessao esta aberta !
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Você precisa estar logando para visualizar sua pagina de Administrador!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $nome = $_SESSION['nome'];
    $sobrenome = $_SESSION['sobrenome'];
    $email = $_SESSION['email'];
	
	
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Bem vindo <?= $nome.' '.$sobrenome ?></title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>

<body>
  <div class="form">

          <h1>Welcome</h1>


    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
