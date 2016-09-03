<?php
# Definindo pacotes de retorno em padr�o JSON...
header('Content-Type: application/json;charset=utf-8');

# Carregando o framework Slim...
require '../lib/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

# Iniciando o objeto de manipula��o da API SlimFramework
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

# Fun��o de teste de funcionamento da API...
$app->get('/', function () {
    echo "Bem-vindo a API do Sistema de Clientes";
});

# Fun��o para obter dados da tabela 'cliente'...
$app->get('/linguagem',function(){
    include("conection.php");
    # Validar se houve conex�o...
    # Vari�vel que ir� ser o retorno (pacote JSON)...
    $retorno = array();

    # Selecionar todos os cadastros da tabela 'cliente'...
    $registros = $conexao->query("select * from lingua");

    # Transformando resultset em array, caso ache registros...
    if($registros->num_rows>0){
        while($linguagem = $registros->fetch_array(MYSQL_BOTH)) {
            $registro = array(
                        "id"   => $linguagem["id"],
                        "nome"     => utf8_encode($linguagem["nome"]),
                        "historia" => $linguagem["historia"],
                        "descricao"    => $linguagem["descricao"],
                        "criador"    => $linguagem["criador"],
                        "requisitos"    => $linguagem["requisitos"],
                        "tipo"    => $linguagem["tipo"],
                        "imagem"    => $linguagem["imagem"]

                      );
            $retorno[] = $registro;
        }
    }
    # Encerrar conex�o...
    $conexao->close();

    # Retornando o pacote (JSON)...
    $retorno = json_encode($retorno);
    echo $retorno;

});

# Executar a API (deix�-la acess�vel)...
$app->run();

?>
