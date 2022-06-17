<?php
session_start();
include 'conexao.php';
include 'verificalog.php';



$email = $_SESSION['email'];



$sql = "select id from user where email = '$email'";
$query = mysqli_query($conexao, $sql);

?>


<!DOCTYPE html>

<html>
<head>
	<title>Hey You!</title>


	<script src="https://kit.fontawesome.com/7ab4100f2c.js" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="post.css?v=<?php echo time();?>">
	
</head>
<body>

<div id="navbar">

<div id="nav"> <b>Heyou</b> </div>

		<div id="menu"> <i class="fas fa-ellipsis-h"></i>


			<div id="cont" style="background-color: white; border-radius: 15px;"> <a href="user.php">Inicio</a> <a href="alarme.php"> Alarmes </a> <a href="post.php">Anotações</a> <a href="logout.php">Logout</a></div>


		</div>

</div>
	
	<button class="b1">
		<div id="log"> 

		
			
				<i class="fas fa-plus"><span> Adicionar anotação</span></i>
				<div id="form">
				
				<div id = "ali">
				<form action="" method="post">
				<input type="text" name="titulo" placeholder="Insira o Titulo"/><br>
				<textarea name="conteudo" placeholder="Insira o conteudo" rows="10" cols="35"></textarea>
				
				<p align="right"><input type="submit" value="Publicar" /> </p>
				<input type="hidden" name="enviar" value="send" />
				
				</div>
				</form>
				
				</div>
		

		 </div>
		 </div>
		 
		 <?php 
		 if (isset($_POST['enviar']) && $_POST['enviar'] == "send") {
		     
		     $titulo = $_POST['titulo'];
		     $conteudo = $_POST['conteudo'];
		     $row;
		     $id_user;
		     while ($row=$query->fetch_assoc()){
		         
		         $id_user = $row['id'];
		         
		     }
		     
		     $ins = mysqli_query($conexao,"insert into post (titulo, conteudo, id_user) values ('$titulo','$conteudo','$id_user')");
		     header("location: post.php");
		     exit();
            		     
		     
		 }
		 
		 
		 
		 ?>
	</button>
	<br>
	<p align="center">
	<?php 
	$row;
	$id_user;
	while ($row=$query->fetch_assoc()){
	    
	    $id_user = $row['id'];
	    
	}
	   $seleciona = mysqli_query($conexao, "select * from post where id_user = '$id_user' order by id desc");
       $conta = mysqli_num_rows($seleciona);
       
       if ($conta <=0){
           
           echo "nenhum post encontrado";
           
       }else {
           
           while ($row = mysqli_fetch_array($seleciona)) {
             $titulo = $row['titulo'];
             $conteudo = $row['conteudo'];
           
            $id = $row['id'];
            
           
          
             
             
             
?>           
</p>	
	
	
	<div id="panel">
	<div id="panel_in">
	<h1> <?php echo $titulo ?></h1>
	 <p><?php echo $conteudo?></p>
	 
	 <form method="post">
	<input type="hidden" value="<?php echo $titulo ?>" name ="del"/>
	 
	  <p><input type="submit" name ="delbttn" value="Apagar" id="delbttn"></p>
	 <input type="hidden" name="enviardel" value="senddel" />
				
	 
	 </form>
	 
	 </div>
	 
	 
	  </div>
	





<?php }};

if (isset($_POST['enviardel']) && $_POST['enviardel'] == "senddel") {
    $delet = $_POST['del'];
    
    $sqldel = mysqli_query($conexao, "DELETE FROM post where titulo='$delet'");
    
    $sqlsel = mysqli_query($conexao, "select * from post where titulo = '$delet'");
    
    $verifica = mysqli_num_rows($sqlsel);
    
    
    if ($verifica==0) {
        echo("<meta http-equiv='refresh' content='1'>");
        exit();
    }
    
}

?>
</body>
</html>