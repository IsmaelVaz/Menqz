<?php 
    include("api/conection.php");

    $cod="";
    $nome="";
    $hist="";
    $desc="";
    $criador="";
    $requisitos="";
    $tipo="";
    $imagem="";
    $btn = "Enviar";
    if(isset($_POST['btnenviar'])){
        $uploaddir='img/';//Nome da pasta que você quer salvar
        $cod=$_POST['txtcod'];
        $nome=$_POST['txtnome'];
        $hist=$_POST['txthist'];
        $desc=$_POST['txtdesc'];
        $criador=$_POST['txtcriador'];
        $requisitos=$_POST['txtreq'];
        $tipo=$_POST['slt'];
        $imagem=basename($_FILES['userfile']['name']);
        
        $btnuser=$_POST['btnenviar'];
        if($btnuser=="Atualizar"){
            
            if($imagem != null || $imagem != ''){
                //userfile é o nome do Input no html
                $nome_arq=basename($_FILES['userfile']['name']);//Pega só o nome da imagem

                $uploadfile=$uploaddir.$nome_arq;//Concatena o caminho com o nome do arquivo

                //Verifica a extensão do arquivo
                if(substr($uploadfile, -4) == '.jpg' || substr($uploadfile, -4) == '.png' || substr($uploadfile, -4) == '.jpeg'){

                    //Move o aquivo para a pasta e retorna true caso não de erro
                    if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){

                        //Salva no banco apenas o caminho da imagem
                       $sql="update lingua set nome='$nome', historia='$hist', descricao='$desc', criador='$criador', requisitos='$requisitos', tipo='$tipo', imagem='$uploadfile' where id = $cod";
                        mysqli_query($conexao, $sql);
                        $btn = "Enviar";
                        //mysqli_close($conexao);
                        header("location:index.php");
                    }
                }else{
                    echo('
                        <script>
                            alert("Cadastre apenas imagens jpg, jpeg ou png");
                        </script>
                    ');
                } 
            }else{
                echo "Atualizar sem imagem";
                $sql="update lingua set nome='$nome', historia='$hist', descricao='$desc', criador='$criador', requisitos='$requisitos', tipo='$tipo' where id = $cod";
                echo $sql;
                mysqli_query($conexao, $sql);
                $btn = "Enviar";
                header("location:index.php");
            } 
        }elseif($btnuser=='Enviar'){
            echo "Enviar";
            if($imagem != null || $imagem != ''){
                //userfile é o nome do Input no html
                $nome_arq=basename($_FILES['userfile']['name']);//Pega só o nome da imagem

                $uploadfile=$uploaddir.$nome_arq;//Concatena o caminho com o nome do arquivo

                //Verifica a extensão do arquivo
                if(substr($uploadfile, -4) == '.jpg' || substr($uploadfile, -4) == '.png' || substr($uploadfile, -4) == '.jpeg'){

                    //Move o aquivo para a pasta e retorna true caso não de erro
                    if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){

                        //Salva no banco apenas o caminho da imagem
                        $sql='INSERT INTO lingua(nome, historia, descricao, criador, requisitos, tipo, imagem) values ("'.$nome.'","'.$hist.'", "'.$desc.'.", "'.$criador.'", "'.$requisitos.'", "'.$tipo.'", "'.$uploadfile.'");';
                        mysqli_query($conexao, $sql);
                        //mysqli_close($conexao);
                        header("location:index.php");
                    }else{
                        echo "asdjsvayofvoasd";
                    }
                }else{
                    echo('
                        <script>
                            alert("Cadastre apenas imagens jpg, jpeg ou png");
                        </script>
                    ');
                } 
            }else{
                echo('
                    <script>
                        alert("Cadastre uma imagem");
                    </script>
                ');
            } 

        }
    }
    
    if(isset($_GET['modo'])){
        $modo=$_GET['modo'];
        if($modo == 'editar'){
            $codigo=$_GET['cod'];
            $sql_co="select * from lingua where id=$codigo;";
            $select = $conexao->query($sql_co);
            while($rs=$select->fetch_array()){
                $cod=$rs['id'];
                $nome=$rs['nome'];
                $hist=$rs['historia'];
                $desc=$rs['descricao'];
                $criador=$rs['criador'];
                $requisitos=$rs['requisitos'];
                $tipo=$rs['tipo'];
                $imagem=$rs['imagem'];
                $btn = "Atualizar";
            }
        }elseif($modo == 'excluir'){
            $codigo=$_GET['cod'];
            
            $sql="DELETE FROM lingua where id=$codigo";
            mysqli_query($conexao, $sql);
            header("location:index.php");
        }
    }
?>
<html ng-app="linguagem" lang="pt-br">
  <head>
      <script src="lib/angular/angula.min.js" ></script>
      <script src="lib/Jquery/jquery.min.js"></script>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="stylesheert" type="text/css" href="css/estilo.css" />
      <link rel="stylesheet" type="text/css" href="lib/jquery-ui-1.11.4/jquery-ui.css">
	    <link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css">
	    <script src="lib/bootstrap/bootstrap-3.3.6-dist/js/bootstrap.js"></script>

      <title>Linguagem</title>
      <style type="text/css">
        .jumbotron{

            width:600px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            text-align: center;
        }
        .form-control{
            margin-bottom: 5px;
        }
        input[type="text"]{
            width: 300px;
        }
        input[name="txtcod"]{
            width: 50px;
        }
        textarea{
            width: 300px;
            resize: none;
            height: 70px;
        }
        .title{
            text-align: center;
            font-weight: bold;
        }
        a{
            text-decoration:none;
            color: #000;
        }
        button{
            margin-top: 5px;
        }
      </style>

  	   
  </head>
  <body>
      <div class="jumbotron">
        <div class="container">
          <form method="post" action="index.php" name="cadastro" enctype="multipart/form-data">
            <table class="table">
              <tr>
                <td>Código</td>
                <td><input type="text" name="txtcod" value="<?php echo $cod?>" readonly="readonly"/></td>
              </tr>
              <tr>
                <td>Nome</td>
                <td><input type="text" name="txtnome" required value="<?php echo $nome?>"/></td>
              </tr>
              <tr>
                <td>História</td>
                <td><textarea name="txthist" required><?php echo $hist?></textarea></td>
              </tr>
              <tr>
                <td>Descrição</td>
                <td><textarea name="txtdesc" required><?php echo $desc?></textarea></td>
              </tr>
              <tr>
                <td>Criador</td>
                <td><input type="text" name="txtcriador" required value="<?php echo $criador?>"/></td>
              </tr>
              <tr>
                <td>Requisitos</td>
                <td><textarea name="txtreq" required><?php echo $requisitos?></textarea></td>
              </tr>
              <tr>
                <td>Tipo</td>
                <td>
                    <select name="slt" required>
                        <option>Selecione...</option>
                        <?php
                            if($tipo==""){
                                
                            
                        ?>
                        <option value=1>Interpretada</option>
                        <option value=2>Compilada</option>
                        <option value=3>Interpretada e compilada</option>
                        <?php
                            }else{
                                if($tipo==1){
                                ?>
                                <option value=1 selected>Interpretada</option>
                                <option value=2>Compilada</option>
                                <option value=3>Interpretada e compilada</option>
                                <?php
                                }elseif($tipo==2){
                                ?>
                                <option value=1>Interpretada</option>
                                <option value=2  selected>Compilada</option>
                                <option value=3>Interpretada e compilada</option>
                                <?php
                                }elseif($tipo==3){
                                ?>
                                <option value=1>Interpretada</option>
                                <option value=2>Compilada</option>
                                <option value=3 selected>Interpretada e compilada</option>
                                <?php 
                                }
                            }
                        ?>
                    </select>
                </td>
              </tr>
              <tr>
                <td>Imagem</td>
                <td><input type="file" name="userfile" value="<?php echo $imagem?>"/></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" name="btnenviar" value="<?php echo $btn?>"/></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <div class="jumbotron" style="width:1200px;">
        <table class="table">
          <tr class="title">
            <td>Código</td>
            <td>Nome</td>
            <td>Descrição</td>
            <td>Historia</td>
            <td>Criador</td>
            <td>Requisitos</td>
            <td>Tipo</td>
            <td>Imagem</td>
            <td>Opção</td>
          </tr>
            <?php
                $sql_co="select * from lingua;";
                $select = $conexao->query($sql_co);
                while($rs=$select->fetch_array()){
            ?>
          <tr>
            <td><?php echo $rs['id']?></td>
            <td><?php echo $rs['nome']?></td>
            <td><?php echo $rs['historia']?></td>
            <td><?php echo $rs['descricao']?></td>
            <td><?php echo $rs['criador']?></td>
            <td><?php echo $rs['requisitos']?></td>
            <td><?php echo $rs['tipo']?></td>
            <td><img width="100px" src="<?php echo $rs['imagem']?>" alt=""></td>
            <td>
                <button><a href="index.php?modo=editar&cod=<?php echo $rs['id']?>">Editar</a></button>
                <button><a href="index.php?modo=excluir&cod=<?php echo $rs['id']?>">Excluir</a></button>
            </td>
          </tr>
            <?php
                }
                $conexao->close();
            ?>
        </table>
      </div>
  </body>
</html>