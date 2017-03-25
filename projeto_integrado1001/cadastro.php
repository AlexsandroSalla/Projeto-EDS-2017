
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">

<head>
<title>Construction</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript" src = "cadastro.js"></script>
</head>

<body>


<div id="header">
<div class="bannercima">
<img src="feature-bg.jpg" width="100%" height="120"/>
<h2>AJR <br />COSMÉTICOS</h2>
<div id="designLogin">

</div>
</div>

</div>


		<section>
		<div class="corpoLogin">
			<h1>Preencha o formulário</h1>
			<br/>
			<br/>
		
<form name="cadastro" id="cadastro" action="cadastrando.php" method="POST">

<!-- Nome -->

<td>
Nome : <input name="nome" type="text" id="nome" size="23" maxlength="40" placeholder="Nome" align="middle"><span class="style1">*</span></p>
</td>

<!-- Sobrenome -->

<td>
Sobrenome : <input name="sobrenome" type="text" id="sobrenome" size="23" maxlength="40" placeholder="sobrenome" align="middle"><span class="style1">*</span></p>
</td>

<!-- email -->
<td>
E-mail : <input name="email" type="text" id="email" size="23" maxlength="40" placeholder="email" align="middle"><span class="style1">*</span></p>
</td>

<!-- Senha -->

<td>
Senha : <input name="senha" type="password"  id="senha" size="23" maxlength="40" placeholder="Senha" align="right"><span class="style1">*</span></p>
</td>
</br></br>
<td>


<span class="style1">* Campos com * s&atilde;o obrigat&oacute;rios!          </span></p>
      <p>&nbsp; </p></td>
<br/>
<br/>
<div class="g-recaptcha" data-sitekey="6LegnRQUAAAAAP4D0ks3L9i4dIpEQ0jYtakqdXsc"></div>
<br/>
<td>
<input name="enviar" id="cadastrar" type="submit" value="Concluir Cadastro">
<input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos!" />
</td>
   </form>

		</div>
		</section>	

</div>




<div class="footer">
			<p>Copyright &copy; 2017 - by AjrCosméticos<br>
			<a href="https://www.facebook.com/AJR-Cosm%C3%A9ticos-144001786038697" target="_blank">Facebook</a></p>
		 </div>
		


</body>
</html>