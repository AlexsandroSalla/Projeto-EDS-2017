<?php
/* Displays all error messages */
session_start();
header("charset=UTF-8",true);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Error</title>
   <link rel="stylesheet" href="../css/style.css"/>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="form">
    <h1>Error</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: indexLogin.php" );
    endif;
    ?>
    </p>     
    <a href="../index.php"><button class="button button-block"/>Home</button></a>
</div>
</body>
</html>
