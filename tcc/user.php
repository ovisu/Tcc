<?php 
session_start();
include 'conexao.php';
include 'verificalog.php';



$email = $_SESSION['email'];

$sql = "select nome from user where email = '$email'";
$query = mysqli_query($conexao, $sql);

?>


<!DOCTYPE html>

<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Hey You!</title>

	
	<script src="https://kit.fontawesome.com/7ab4100f2c.js" crossorigin="anonymous"></script>
	
	
	<link rel="stylesheet" href="style3.css?v=<?php echo time(); ?>">
</head>
<body>

<div id="navbar">

<div id="nav"> <b>Heyou</b> </div>

		<div id="menu"> <i class="fas fa-ellipsis-h"></i>


			<div id="cont" style="background-color: white; border-radius: 15px;"> <a href="user.php">Inicio</a> <a href="alarme.php"> Alarmes </a> <a href="post.php">Anotações</a> <a href="logout.php">Logout</a></div>


		</div>

</div>

		<div id="log"> 


			<div id="form">
			<table id = "op">
				<tr>
				<td><a href="alarme.php"> Adicionar novo alarme </a></td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr>
				<td><a href="post.php"> Adicionar nova anotação</a> </td>
				</tr>
				<tr></tr>
				<tr></tr>
							
				
				</table>
				
				
				<div id="user">    </div><br>
				<div id ="username">
				<h2>
				<?php 
				while ($row=$query->fetch_assoc()){
				    
				    echo $row['nome'];
				}
				?>
				
				</h2></div>
				
				
			</div>


		 </div>


</body>
</html>