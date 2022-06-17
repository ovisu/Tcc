<?php

session_start();
include 'conexao.php';

if (empty($_POST['email']) || empty($_POST['senha'])){
     
    
    header('location: login.php');    
    exit();
}
    
    
$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT * from user where email = '$email' and senha = '$senha'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row==1){
    
    
    $_SESSION['email'] = $email;
    
   
    header('location: user.php');
    
    
    exit();
   
    
}else{

    $_SESSION['naoaut'] = true;
    header('location: login.php'); 
    exit();
    
}
