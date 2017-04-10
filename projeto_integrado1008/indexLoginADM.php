<?php 
/* Pagina de Login*/
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <?php include 'css/css.html'; ?>
</head>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //Se a opção for login chama o arquivo login.php
        require 'loginAdmin.php';
    }
    
    elseif (isset($_POST['register'])) { //se nao chama o register.php
        
        
    }
}
?>

<body>
	
	
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active">
		<h1>Bem Vindo Administrador!</h1>
      </ul>
      
      <div class="tab-content">
		
         <div id="login">   
          
          <form action="indexLoginADM.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Email <span class="req">*</span>            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Senha <span class="req">*</span>            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>
          
          <p class="forgot"><a href="forgotADM.php">Esqueceu a senha?</a></p>
          
          <button class="button button-block" name="login" />Entrar</button>
          <br />
		  <br />
          </form>

        </div>
		  <br />
		  <br />
          <a href="index.php"><button class="button button-block" name="index"/>Inicio da pagina</button></a>
          </form>
		  
        </div> 
        
      </div><!-- tab-content -->
	  
	 <br/>
		

      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>