<?php 
session_start();
require 'db.php';

		$conf = true;

      if ( isset($_SESSION['nome']) )
          {
            $nome = $_SESSION['nome'];
          }else  {
		  
		  $login = isset($_SESSION['logged_in']);
		  
		  }
          ?>
	
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">

<head>
<title>..:Bem vindo a AjrCosméticos:..</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style2.css"/>

</head>





<body>
			<h2>AJR <br />COSMÉTICOS</h2>
			<div class="bannercima">
			
			<header> 
			<img src="img/feature.jpg" alt="Responsive image" width="100%" height="800px">
			</div>
			<div id="texto"></div>
			</header>
			</div>
		
					<nav>
				<div class="topnav">

		<h1>Menu Principal</h1>
		
		
		
		<ul>	
		<li><a href="index.php" class="nounderline">Home</a></li>
		<li><a href="" class="nounderline">Produtos</a></li>
		<li><a href="" class="nounderline">Localizacao</a> </li>
		<li><a href="" class="nounderline">Fale conosco</a> </li>
		<?php if ( isset($_SESSION['nome']) )
          { ?>
            <li><a href="logout.php" class="nounderline">Logout</a></li>
			<br />
			<h1 style="color:#000000;">Bem vindo <h1 style="color:red;"><?php echo "$nome";?></h1></h1>
         <?php  } else { ?>
		 	<li><a href="indexLogin.php" class="nounderline">Login</a></li>
		 <?php } ?>
          
         
		</ul>
		</div>
		</nav>



		<section>
			<div class="corpo">
			<h1 id="titulohome">Home</h1>
			 <p>Anderson entra no metro com mochila</p> 
			 
			</div>
		</section>	


<div class="footer">
			<p>Copyright &copy; 2017 - by AjrCosméticos<br>
			<a href="https://www.facebook.com/AJR-Cosm%C3%A9ticos-144001786038697" target="_blank">Facebook</a></p>
		 </div>
		


</body>
</html>