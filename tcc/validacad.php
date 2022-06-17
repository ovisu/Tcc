<?php
include 'conexao.php';
include 'caddao.php';

$nome=$_POST['nome'];
$nasc=$_POST['nasc'];
$email=$_POST['email'];
$senha=$_POST['senha'];

$valida = new caddao();

if ($valida->validacad($nome, $nasc, $email, $senha)){
    
    echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='login.php'</script>";
    
}else {
    
    
    echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cad.html'</script>";
    
    
}