<?php
    //1 – Definimos Para quem vai ser enviado o email
    $para = "ismaelvaz18@hotmail.com";
    //2 - resgatar o nome digitado no formulário e  grava na variavel $nome
    $nome = $_POST['txtnome'];
    // 3 - resgatar o assunto digitado no formulário e  grava na variavel //$assunto
    $email = $_POST['txtemail'];
    $telefone = $_POST['txttelefone'];
    $assunto = "Email do site menqz.pe.hu";
    $msn = $_POST['txtmensagem'];
   //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
    $mensagem = "<strong>Nome:  </strong>".$nome;
    $mensagem .= "<br>  <strong>Email: </strong>".$email;
    $mensagem .= "<br>  <strong>Telefone: </strong>".$telefone;
    $mensagem .= "<br>  <strong>Mensagem: </strong>".$msn;

//5 – agora inserimos as codificações corretas e  tudo mais.
  $headers =  "Content-Type:text/html; charset=UTF-8\n";
  $headers .= "From:  menqz.pe.hu<contato@menqz.pe.hu>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
  $headers .= "X-Sender:  <contato@menqz.pe.hu>\n"; //email do servidor //que enviou
  $headers .= "X-Mailer: PHP  v".phpversion()."\n";
  $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
  $headers .= "Return-Path:  <$email>\n"; //caso a msg //seja respondida vai para  este email.
  $headers .= "MIME-Version: 1.0\n";

mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email.
header("location:contato.php");
  ?>