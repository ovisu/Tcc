<?php session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Hey You!</title>

	<link rel="stylesheet" href="style2.css?v=<?php echo time(); ?>">
	<script src="https://kit.fontawesome.com/7ab4100f2c.js" crossorigin="anonymous"></script>
</head>
<body>

<div id="navbar">

<div id="nav"> <b>Heyou</b> </div>

		<div id="menu"> <i class="fas fa-ellipsis-h"></i>


			<div id="cont" style="background-color: white; border-radius: 15px;"> <a href="index.html">Inicio</a> <a href=""> Sobre nos</a> <a href="">Contato</a></div>


		</div>

</div>

		<div id="log"> 


			<div id="form">
				
				<h1>Login</h1>

				<form action="log.php" method="post">
					
					E-mail: <input type="E-mail" name="email"><br><br>
					Senha: <input type="password" name="senha"><br><br>
					<input type="submit" name="enviar"> <br><br>
					
					<?php if (isset($_SESSION['naoaut'])):?>
					<p>Login ou senha incorretos</p>
					<?php 
					unset($_SESSION['naoaut']);
					endif;
					
					?>
					
		
					


				</form>

			</div>


		 </div>


</body>
</html>
