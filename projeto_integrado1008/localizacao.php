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

<link rel="stylesheet" href="css/style2.css"/>
<link rel="stylesheet" href="css/vendors/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="css/vendors/owl-carousel/owl.theme.default.min.css">
<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
 html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 400px;
	  margin-top:-350px; }
	</style>


</head>





<body>
			<h2>AJR <br />COSMÉTICOS</h2>
			
		
					<nav>
				<div class="topnav">

		
		
		
		<ul>	
		<li><a href="index.php" class="nounderline">Home</a></li>
		<li><a href="produto.php" class="nounderline">Produtos</a></li>
		<li><a href="localizacao.php" class="nounderline">Localizacao</a> </li>
		<li><a href="fale_conosco.php" class="nounderline">Fale conosco</a> </li>
		<?php if ( isset($_SESSION['nome']) )
          { ?>
            <li><a href="logout.php" class="nounderline">Logout</a></li>
			<br />
			<h1 style="color:#FF99FF; position:relative; margin-left:1600px; margin-top:-50px;">Bem vindo <h1 style="color:#FFFFFF; position:relative; margin-left:1600px; margin-top:-30px;"><?php echo "$nome";?></h1></h1>
         <?php  } else { ?>
		 	<li><a href="indexLogin.php" class="nounderline">Login</a></li>
		 <?php } ?>
         
		</ul>
		</div>
		</nav>
<br />
<div class="bannercima">
			
	<header> 
		<div class="slider-area">
			<div class="slider-active owl-carousel">
				<img src="img/feature.png" alt="" />
				<img src="img/feature1.png" alt="" />
			</div>
		</div>	
		
		
			</header>
			</div>


		<br/>
		<br/>


		<section>
				<div id="corpo">
	 <div id="mapa" style="height: 500px; width: 700px">
        </div>
 
        <!-- Maps API Javascript -->
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAuYpGSBUmm-ssSSzsm99SYAnk29xYkTPo&amp;sensor=false"></script>
 
        <!-- Arquivo de inicialização do mapa -->
        <script src="js/localizacao.js"></script>
			</div>
			</div>
		</section>	

<br />
<br />

<div class="footer">
			<p>Copyright &copy; 2017 - by AjrCosméticos<br>
			<a href="https://www.facebook.com/AJR-Cosm%C3%A9ticos-144001786038697" target="_blank">Facebook</a></p>
		 </div>
		 
	
	<script src="js/vendors/jquery/jquery.min.js"></script>
	<script src="js/vendors/owl-carousel/owl.carousel.min.js"></script>
		<script src="js/main.js"></script>
	

</body>
</html>




	 




