<?php

class caddao {
    
public function validacad($nome, $nasc, $email, $senha) {

    include 'conexao.php';
    
    $insert = mysqli_query($conexao, "insert into user (nome, nasc, email, senha) values ('$nome', '$nasc', '$email', '$senha')");
    
  
    
    $sql = mysqli_query($conexao, "select nome from user where nome='$nome'");
    
    
    
    $row = mysqli_num_rows($sql);
   
    if ($row > 0){
        
        
        return 1;
        
    }else {
        
        return 0;
        
    }
    
    
    
    
    
    
    
    
}


    
    
    
    
    
    
    
    
    
    
    
}
