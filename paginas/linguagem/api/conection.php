<?php
  # Abrir conex�o com banco de dados...
    //$conexao = new MySQLi("localhost", "root", "bcd127", "linguagem");
    $conexao = new MySQLi("localhost", "u461850651_admin", "dbalingua", "u461850651_ling");
    # Validar se houve conex�o...
    if(!$conexao){ echo "N�o foi poss�vel se conectar ao banco de dados"; exit;}
    
    session_start();
?>