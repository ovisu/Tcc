<?php
session_start();
include 'conexao.php';
include 'verificalog.php';


date_default_timezone_set('America/Araguaina');

$email = $_SESSION['email'];



$sql = "select id from user where email = '$email'";
$query = mysqli_query($conexao, $sql);







?>


<!DOCTYPE html>

<html>
<head>
	<title>Hey You!</title>


	<script src="https://kit.fontawesome.com/7ab4100f2c.js" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="alarme.css?v=<?php echo time();?>">
	
	
	
	<script type="text/javascript">
	
	
	
	</script>
	
	
	
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

		
			
				<i class="far fa-clock"><span> Adicionar alarme</span></i>
				<div id="form">
				
				<div id = "ali">
				<form action="" method="post">
				
				<input tyoe="text" name="titulo" placeholder="Insira o titulo do alarme"/><br>
				<input type="time" name="hora"/><br>
				
				
				<p align="right"><input type="submit" value="Publicar" /> </p>
				<input type="hidden" name="enviar" value="send" />
				
				</div>
				</form>
				
				</div>
		

		 </div>
		 </div>
		 
		 <?php 
		 if (isset($_POST['enviar']) && $_POST['enviar'] == "send") {
		     
		     $titulo=$_POST['titulo'];
		     $hora = $_POST['hora'];
		     $row;
		     $id_user;
		     while ($row=$query->fetch_assoc()){
		         
		         $id_user = $row['id'];
		         
		     }
		     
		     $ins = mysqli_query($conexao,"insert into alarme (hora, id_user, titulo) values ('$hora','$id_user','$titulo')");
		     header("location: alarme.php");
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
	   $seleciona = mysqli_query($conexao, "select * from alarme where id_user = '$id_user' order by id desc");
       $conta = mysqli_num_rows($seleciona);
       
       if ($conta <=0){
           
           echo "nenhum alarme encontrado encontrado";
           
       }else {
            
           
           while ($row = mysqli_fetch_array($seleciona)) {
             $titulo = $row['titulo'];
             $hora = $row['hora'];
           
           
           
           
             
             
?>           
</p>	
	
<h1></h1>

	<script type="text/javascript">
		var horas;
		
	
		function relogio(){
		
			var data=new Date();
			var hora = data.getHours();
			var min = data.getMinutes();
			var seg = data.getSeconds();
		
			if (hora<10){
		
				hora = "0"+hora;
		
		
			}
			if (min<10){
		
				min = "0"+min;
		
		
			}
			if (seg<10){
		
				seg = "0"+seg;
		
		
			}
			
			
			var horas = hora+":"+min+":"+seg;
				
			
			var alarme="<?php print $hora?>";
			var tit="<?php print $titulo?>";
			if(horas==alarme){
		
			alert(tit+" esta despertando");
		
		}
		
		}
	
	
	var tempo=setInterval(relogio,1000);
	
		
	
	
	</script>
	<div id="panel">
	<div id="panel_in">
	<h1> <?php echo $titulo?></h1>

	 <p><?php echo $hora?></p>
	
	 
	
	 
	 <form method="post">
	<input type="hidden" value="<?php echo $titulo ?>" name ="del"/>
	 
	  <p><input type="submit" name ="delbttn" value="Apagar" ></p>
	 <input type="hidden" name="enviardel" value="senddel" />
				
	 
	 </form>
	
	 
	 </div>
	 
	 
	  </div>
	





<?php }};

        
    if (isset($_POST['enviardel']) && $_POST['enviardel'] == "senddel") {
       $delet = $_POST['del'];
    
       $sqldel = mysqli_query($conexao, "DELETE FROM alarme where titulo='$delet'");
       
       $sqlsel = mysqli_query($conexao, "select * from alarme where  titulo = '$delet'");
       
       $verifica = mysqli_num_rows($sqlsel);
       
        
       if ($verifica==0) {
           echo("<meta http-equiv='refresh' content='1'>");
           exit();
       }
      
    }
       
   
   
    


?>
<p> </p>
</body>
</html>
