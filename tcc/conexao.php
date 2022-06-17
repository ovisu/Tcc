<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "heyou";
$conexao = mysqli_connect($host, $user, $pass, $banco);
mysqli_select_db($conexao, $banco);

setlocale(LC_ALL,'pt_BR.UTF8');
mb_internal_encoding('UTF8');
mb_regex_encoding('UTF8');

?>
